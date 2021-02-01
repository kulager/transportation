<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\OrderWebRequest;
use App\Models\Entities\Address;
use App\Models\Entities\Box;
use App\Models\Entities\Company;
use App\Models\Entities\Order;
use App\Models\Entities\OrderProduct;
use App\Models\Entities\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use NumberFormatter;
use PhpOffice\PhpWord\TemplateProcessor;
use ZipArchive;


class OrderController extends WebBaseController
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminPagesView('order.index', compact('orders'));
    }

    public function create($id = null)
    {
        $order = null;

        if ($id) {
            $order = Order::with('products')->find($id);
        }
        $addresses = Address::all();
        $products = Product::all();
        $boxes = Box::all();
        $companies = Company::all();

        foreach ($addresses as $address) {
            $address->name = $address->city->country->name . ', ' . $address->city->name . ', ' . $address->name;
        }
        return $this->adminPagesView('order.form', compact('order', 'addresses',
            'products', 'boxes', 'companies'));
    }

    public function store(OrderWebRequest $request)
    {
        $order = new Order();
        if ($request->id) {
            $order = Order::find($request->id);
        }
        try {
            $product_ids = [];
            $products = [];
            DB::beginTransaction();
            $order->driver_full_name = $request->driver_full_name;
            $order->second_driver_full_name = $request->second_driver_full_name;
            $order->contract_person = $request->contract_person;
            $order->driver_passport = $request->driver_passport;
            $order->driver_birth_date = $request->driver_birth_date;
            $order->document_id = $request->document_id;
            $order->company_id = $request->company_id;
            $order->address_id = $request->address_id;

            $order->deadline = Carbon::create($request->date)->addDays(11);
            $order->date = $request->date;
            $order->car_number = $request->car_number;
            $order->car_brand = $request->car_brand;
            $order->second_car_brand = $request->second_car_brand;
            $order->second_car_number = $request->second_car_number;
            $order->save();
            $now = now();
            foreach ($request->products as $product) {
                if (!$request->id) {
                    $products[] = [
                        'box_id' => $product['box'],
                        'product_id' => $product['id'],
                        'net_weight' => $product['net_weight'],
                        'gross_weight' => $product['gross_weight'],
                        'place_quantity' => $product['place_quantity'],
                        'order_id' => $order->id,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                } else {
                    $product_ids[] = $product['id'];
                }
            }

            if ($product_ids) {
                $order_products = OrderProduct::where('order_id', $order->id)->whereIn('product_id', $product_ids)->get();
                foreach ($request->products as $product) {
                    $order_product = $order_products->where('product_id', $product['id'])->first();
                    if ($order_product) {
                        $order_product->update([
                            'box_id' => $product['box'],
                            'net_weight' => $product['net_weight'],
                            'gross_weight' => $product['gross_weight'],
                            'place_quantity' => $product['place_quantity'],
                        ]);
                    } else {
                        $products[] = [
                            'box_id' => $product['box'],
                            'product_id' => $product['id'],
                            'net_weight' => $product['net_weight'],
                            'gross_weight' => $product['gross_weight'],
                            'place_quantity' => $product['place_quantity'],
                            'order_id' => $order->id,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ];
                    }
                }
            }
            OrderProduct::insert($products);
            if ($product_ids) {
                OrderProduct::where('order_id', $order->id)->whereNotIn('product_id', $product_ids)->delete();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new WebServiceExplainedException('Техническая ошибка! ' . $exception->getMessage());
        }
        $this->edited();
        return redirect()->route('order.index');

    }

    public function cmr($id)
    {
        $order = $this->checkOrder($id);
        if (!$order->driver_full_name && !$order->driver_passport && !$order->birth_date) {
            throw new WebServiceExplainedException('Заполните водителя!');

        }

        if (!$order->contract_person) {
            throw new WebServiceExplainedException('Заполните ЧЛ!');
        }

        $path = $this->createCmrDoc($order);
        return response()->download($path)->deleteFileAfterSend();
    }

    public function driver($id)
    {

        $order = $this->checkOrder($id);
        if (!$order->driver_full_name && !$order->driver_passport && !$order->birth_date) {
            throw new WebServiceExplainedException('Заполните водителя!');

        }

        $path = $this->createDriverDoc($order);

        return response()->download($path)->deleteFileAfterSend();
    }

    public function goods($id)
    {
        $order = $this->checkOrder($id);
        $path = $this->createGoodsDoc($order);

        return response()->download($path)->deleteFileAfterSend();
    }

    public function contract($id)
    {
        $order = $this->checkOrder($id);
        $path = $this->createContractDoc($order);
        return response()->download($path)->deleteFileAfterSend();
    }

    public function realization($id)
    {
        $order = $this->checkOrder($id);
        $total_net = 0;
        $total = 0;
        $digit = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
        $i = 1;
        $splitted = explode(' ', $order->contract_person, 3);
        $format_contract_person = $splitted[0] . ' ';
        $format_contract_person .= isset($splitted[1]) ? mb_substr($splitted[1], 0, 1) . '.' : '';
        $format_contract_person .= isset($splitted[2]) ? mb_substr($splitted[2], 0, 1) . '.' : '';

        foreach ($order->products as $product) {
            $total += $product->product->price * $product->net_weight;
            $total_net += $product->net_weight;

        }
        $total_net_format = $this->upperFirst($digit->format($total_net), "UTF-8");
        $total_format = $this->upperFirst($digit->format($total), "UTF-8");
        $date_format = Carbon::create($order->date)->format('d.m.Y');
        return $this->adminPagesView('order.realization', compact('order', 'date_format',
            'total', 'total_net', 'total_format', 'total_net_format', 'i', 'format_contract_person'));
    }

    public function invoice($id)
    {

        $order = $this->checkOrder($id);
        $total = 0;
        $digit = new NumberFormatter("ru", NumberFormatter::SPELLOUT);
        $i = 1;
        foreach ($order->products as $product) {
            $total += $product->product->price * $product->net_weight;
        }
        $total_format = $this->upperFirst($digit->format($total), "UTF-8");
        $date_format = Carbon::create($order->date)->format('d.m.Y');
        return $this->adminPagesView('order.invoice', compact('order', 'date_format',
            'total', 'total_format', 'i'));
    }

    private function checkOrder($id)
    {
        $order = Order::with('products.product', 'products.box', 'address.city.country', 'company')->find($id);
        if (!$order) throw new WebServiceExplainedException('Заказ не найден!');
        if (!$order->driver_full_name && !$order->driver_passport && !$order->birth_date && !$order->contract_person) {
            throw new WebServiceExplainedException('Заполните все обязательные поля!');

        }

        return $order;
    }

    function upperFirst($string, $encoding)
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }

    public function zipDownload($id)
    {
        $order = $this->checkOrder($id);

        $driver = $this->createDriverDoc($order);
        $contract = $this->createContractDoc($order);
        $goods = $this->createGoodsDoc($order);
        $cmr = $this->createCmrDoc($order);

        $zip = new ZipArchive();
        if ($zip->open(storage_path('templates/common.zip'), ZipArchive::CREATE) === TRUE) {
            $zip->addFile($driver, 'driver.docx');
            $zip->addFile($contract, 'contract.docx');
            $zip->addFile($goods, 'goods.docx');
            $zip->addFile($cmr, 'cmr.docx');
            $zip->close();

            return response()->download(storage_path('templates/common.zip'),
                $order->company->name. '№'.$order->document_id.'.zip')->deleteFileAfterSend();
        }
        return redirect()->route('order.index');

    }

    private function createGoodsDoc($order) {
        $my_template = new TemplateProcessor(storage_path('templates/goods.docx'));
        $my_template->setValue('address', $order->address->city->country->second_name . ', г. ' . $order->address->city->name . ', ' . $order->address->name);
        $my_template->setValue('company_name', $order->company->name);
        $my_template->setValue('company_inn', $order->company->bin_inn);
        $my_template->setValue('driver_full_name', $order->driver_full_name);
        $my_template->setValue('driver_birth_date', Carbon::create($order->driver_birth_date)->format('d.m.Y'));
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('date', Carbon::create($order->date)->format('d.m.Y'));
        $my_template->setValue('date_format', Carbon::createFromFormat('Y-m-d', $order->date)->isoFormat('"D" MMMM Y г.'));
        $my_template->setValue('deadline_format', Carbon::createFromFormat('Y-m-d', $order->deadline)->isoFormat('"D" MMMM Y г.'));
        $my_template->setValue('driver_passport', $order->driver_passport);
        $my_template->setValue('car_brand', $order->car_brand);
        $my_template->setValue('car_number', $order->car_number);
        $my_template->setValue('second_car_brand', $order->second_car_brand);
        $my_template->setValue('second_car_number', $order->second_car_number);

        $count = 0;
        $total = 0;
        $products = [];
        $total_gross = 0;
        $total_net = 0;
        $total_place = 0;
        $digit = new NumberFormatter("ru", NumberFormatter::SPELLOUT);

        foreach ($order->products as $product) {
            $products[] = [
                'product_tn_id' => '',
                'product_name' => $product->product->name,
                'product_price' => $product->product->price,
                'box' => $product->box->name,
                'place_quantity' => $product->place_quantity,
                'net' => $product->net_weight,
                'gross' => $product->gross_weight,
                'total' => $product->product->price * $product->net_weight,
                'row' => '',
            ];
            $total += $product->product->price * $product->net_weight;
            $total_gross += $product->gross_weight;
            $total_net += $product->net_weight;
            $total_place += $product->place_quantity;
            $count++;
        }
        $my_template->cloneRowAndSetValues('row', $products);
        $my_template->setValue('product_count', $this->upperFirst($digit->format($count), "UTF-8"));
        $my_template->setValue('total_sum', $this->upperFirst($digit->format($total), "UTF-8"));
        $my_template->setValue('total_net', $this->upperFirst($digit->format($total_net), "UTF-8"));
        $my_template->setValue('total_gross', $this->upperFirst($digit->format($total_gross), "UTF-8"));
        $my_template->setValue('total_place', $this->upperFirst($digit->format($total_place), "UTF-8"));

        try {
            $my_template->saveAs(storage_path('docs/goods.docx'));
        } catch (\Exception $e) {
            throw new WebServiceExplainedException('Техническая ошибка! ' . $e->getMessage());
        }

        return storage_path('docs/goods.docx');
    }

    private function createContractDoc($order) {
        $my_template = new TemplateProcessor(storage_path('templates/contract.docx'));
        if (!$order->contract_person) {
            throw new WebServiceExplainedException('Заполните ЧЛ!');

        }

        $splitted = explode(' ', $order->contract_person, 3);
        $format_contract_person = $splitted[0] . ' ';
        $format_contract_person .= isset($splitted[1]) ? mb_substr($splitted[1], 0, 1) . '.' : '';
        $format_contract_person .= isset($splitted[2]) ? mb_substr($splitted[2], 0, 1) . '.' : '';
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('contract_person', $order->contract_person);
        $my_template->setValue('contract_person_format', $format_contract_person);
        $my_template->setValue('date', Carbon::createFromFormat('Y-m-d', $order->date)->isoFormat('D «MMMM» Y год'));

        try {
            $my_template->saveAs(storage_path('docs/contract.docx'));
        } catch (\Exception $e) {
            throw new WebServiceExplainedException('Техническая ошибка! ' . $e->getMessage());
        }
        return storage_path('docs/contract.docx');
    }

    private function createDriverDoc($order) {
        $my_template = new TemplateProcessor(storage_path('templates/driver.docx'));
        $my_template->setValue('country', $order->address->city->country->name);
        $my_template->setValue('city', $order->address->city->name);
        $my_template->setValue('full_name', $order->driver_full_name);
        $my_template->setValue('birth_date', Carbon::create($order->driver_birth_date)->format('d.m.Y'));
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('date', Carbon::create($order->date)->format('d.m.Y'));
        $my_template->setValue('passport', $order->driver_passport);
        $my_template->setValue('product_name', $order->products->first()->product->name);

        try {
            $my_template->saveAs(storage_path('docs/driver.docx'));
        } catch (Exception $e) {
            throw new WebServiceExplainedException('Техническая ошибка! ' . $e->getMessage());
        }

        return storage_path('docs/driver.docx');
    }

    private function createCmrDoc($order) {
        $splitted = explode(' ', $order->contract_person, 3);
        $splitted_driver = explode(' ', $order->driver_full_name, 3);
        $splitted_second_driver = explode(' ', $order->second_driver_full_name, 3);

        $format_driver = $splitted_driver[0] . ' ';
        $format_driver .= isset($splitted_driver[1]) ? mb_substr($splitted_driver[1], 0, 1) . '.' : '';
        $format_driver .= isset($splitted_driver[2]) ? mb_substr($splitted_driver[2], 0, 1) . '.' : '';

        $format_second_driver = '';
        if($order->second_driver_full_name) {
            $format_second_driver = $splitted_second_driver[0] . ' ';
            $format_second_driver .= isset($splitted_second_driver[1]) ? mb_substr($splitted_second_driver[1], 0, 1) . '.' : '';
            $format_second_driver .= isset($splitted_second_driver[2]) ? mb_substr($splitted_second_driver[2], 0, 1) . '.' : '';
        }

        $format_contract_person = $splitted[0] . ' ';
        $format_contract_person .= isset($splitted[1]) ? mb_substr($splitted[1], 0, 1) . '.' : '';
        $format_contract_person .= isset($splitted[2]) ? mb_substr($splitted[2], 0, 1) . '.' : '';
        $my_template = new TemplateProcessor(storage_path('templates/cmr.docx'));
        $my_template->setValue('country', $order->address->city->country->name);
        $my_template->setValue('address', 'г. ' . $order->address->city->name . ', ' . $order->address->name);
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('company_name', $order->company->name);
        $my_template->setValue('company_inn', $order->company->bin_inn);
        $my_template->setValue('car_brand', $order->car_brand);
        $my_template->setValue('car_number', $order->car_number);
        $my_template->setValue('second_car_brand', $order->second_car_brand);
        $my_template->setValue('second_car_number', $order->second_car_number);
        $my_template->setValue('contract_person', $format_contract_person);
        $my_template->setValue('driver', $format_driver);
        $my_template->setValue('second_driver', $format_second_driver);
        $my_template->setValue('date', Carbon::createFromFormat('Y-m-d', $order->date)->isoFormat('D MMMM Y год'));
        $my_template->setValue('day', Carbon::create($order->date)->day);
        $my_template->setValue('month', Carbon::create($order->date)->month);
        $my_template->setValue('year', Carbon::create($order->date)->year);

        $count = 0;
        $total = 0;
        $products = [];
        foreach ($order->products as $product) {
            $products[] = [
                'product_tn_id' => $product->product->tn_id,
                'product_name' => $product->product->name,
                'box' => $product->box->name,
                'place_quantity' => $product->place_quantity,
                'net' => $product->net_weight,
                'gross' => $product->gross_weight,
                'row' => '',
            ];
            $total += $product->product->price * $product->net_weight;
            $count++;
        }
        $my_template->cloneRowAndSetValues('row', $products);

        $my_template->setValue('total', $total);

        try {
            $my_template->saveAs(storage_path('docs/cmr.docx'));
        } catch (Exception $e) {
            throw new WebServiceExplainedException('Техническая ошибка! ' . $e->getMessage());
        }

        return storage_path('docs/cmr.docx');
    }
}

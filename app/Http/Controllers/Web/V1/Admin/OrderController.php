<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\OrderWebRequest;
use App\Models\Entities\Address;
use App\Models\Entities\Box;
use App\Models\Entities\Company;
use App\Models\Entities\Driver;
use App\Models\Entities\Order;
use App\Models\Entities\OrderProduct;
use App\Models\Entities\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use NumberFormatter;
use PhpOffice\PhpWord\TemplateProcessor;


class OrderController extends WebBaseController
{
    public function index() {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return $this->adminPagesView('order.index', compact('orders'));
    }

    public function create($id = null) {
        $order = null;

        if($id) {
            $order = Order::with('products')->find($id);
        }
        $addresses = Address::all();
        $drivers = Driver::all();
        $products = Product::all();
        $boxes = Box::all();
        $companies = Company::all();

        return $this->adminPagesView('order.form', compact('order', 'addresses', 'drivers',
            'products', 'boxes', 'companies'));
    }

    public function store(OrderWebRequest $request) {
        $order = new Order();
        if($request->id) {
            $order = Order::find($request->id);
        }
        try {
            $product_ids = [];
            $products = [];
            DB::beginTransaction();
            $order->driver_id = $request->driver_id;
            $order->document_id = $request->document_id;
            $order->company_id = $request->company_id;
            $order->address_id = $request->address_id;

            $order->deadline = Carbon::create($request->date)->addDays(11);
            $order->date = $request->date;
            $order->second_driver_id = $request->second_driver_id;
            $order->car_number = $request->car_number;
            $order->car_brand = $request->car_brand;
            $order->second_car_brand = $request->second_car_brand;
            $order->second_car_number = $request->second_car_number;
            $order->save();
            $now = now();
            foreach ($request->products as $product) {
                if(!$request->id) {
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

            if($product_ids) {
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
            if($product_ids) {
                OrderProduct::where('order_id', $order->id)->whereNotIn('product_id', $product_ids)->delete();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new WebServiceExplainedException('Техническая ошибка! '. $exception->getMessage());
        }
        $this->edited();
        return redirect()->route('order.index');

    }

    public function cmr($id) {
        $order = $this->checkOrder($id);
        $my_template = new TemplateProcessor(storage_path('templates/cmr.docx'));
        $my_template->setValue('country', $order->address->city->country->name);
        $my_template->setValue('address', 'г. '.$order->address->city->name. ', '.$order->address->name);
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('company_name', $order->company->name);
        $my_template->setValue('company_inn', $order->company->bin_inn);
        $my_template->setValue('car_brand', $order->car_brand);
        $my_template->setValue('car_number', $order->car_number);
        $my_template->setValue('second_car_brand', $order->second_car_brand);
        $my_template->setValue('second_car_number', $order->second_car_number);
        $my_template->setValue('driver', explode($order->driver->full_name, ' ')[0]);
        $my_template->setValue('second_driver', $order->secondDriver ?
            explode($order->secondDriver->full_name, ' ')[0] : '');
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

        try{
            $my_template->saveAs(storage_path('cmr.docx'));
        }catch (Exception $e){
            throw new WebServiceExplainedException('Техническая ошибка! '. $e->getMessage());
        }

        return response()->download(storage_path('cmr.docx'))->deleteFileAfterSend();
    }

    public function driver($id) {

        $order = $this->checkOrder($id);
        $my_template = new TemplateProcessor(storage_path('templates/driver.docx'));
        $my_template->setValue('country', $order->address->city->country->name);
        $my_template->setValue('city', $order->address->city->name);
        $my_template->setValue('full_name', $order->driver->full_name);
        $my_template->setValue('birth_date', Carbon::create($order->driver->birth_date)->format('d.m.Y'));
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('date', Carbon::create($order->date)->format('d.m.Y'));
        $my_template->setValue('passport', $order->driver->passport);
        $my_template->setValue('product_name', $order->products->first()->product->name);
        try{
            $my_template->saveAs(storage_path('driver.docx'));
        }catch (Exception $e){
            throw new WebServiceExplainedException('Техническая ошибка! '. $e->getMessage());
        }

        return response()->download(storage_path('driver.docx'))->deleteFileAfterSend();
    }

    public function goods($id) {
        $order = $this->checkOrder($id);
        $my_template = new TemplateProcessor(storage_path('templates/goods.docx'));
        $my_template->setValue('address', $order->address->city->country->second_name.', г. '.$order->address->city->name. ', '.$order->address->name);
        $my_template->setValue('company_name', $order->company->name);
        $my_template->setValue('company_inn', $order->company->bin_inn);
        $my_template->setValue('driver_full_name', $order->driver->full_name);
        $my_template->setValue('driver_birth_date', Carbon::create($order->driver->birth_date)->format('d.m.Y'));
        $my_template->setValue('document_id', $order->document_id);
        $my_template->setValue('date', Carbon::create($order->date)->format('d.m.Y'));
        $my_template->setValue('date_format', Carbon::createFromFormat('Y-m-d', $order->date)->isoFormat('"D" MMMM Y г.'));
        $my_template->setValue('deadline_format', Carbon::createFromFormat('Y-m-d', $order->deadline)->isoFormat('"D" MMMM Y г.'));
        $my_template->setValue('driver_passport', $order->driver->passport);
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
                'product_tn_id' => $product->product->tn_id,
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

        try{
            $my_template->saveAs(storage_path('goods.docx'));
        }catch (\Exception $e){
            throw new WebServiceExplainedException('Техническая ошибка! '. $e->getMessage());
        }

        return response()->download(storage_path('goods.docx'))->deleteFileAfterSend();
    }

    private function checkOrder($id) {
        $order = Order::with('products.product', 'products.box', 'address.city.country', 'company', 'driver', 'secondDriver')->find($id);
        if(!$order) throw new WebServiceExplainedException('Заказ не найден!');
        return $order;
    }

    function upperFirst($string, $encoding)
    {
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}

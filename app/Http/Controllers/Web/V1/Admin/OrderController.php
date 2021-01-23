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
}

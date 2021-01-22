<?php

namespace App\Http\Controllers\Web\V1\Admin;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\ProductWebForm;
use App\Http\Requests\Web\V1\ProductWebRequest;
use App\Models\Entities\Product;

class ProductController extends WebBaseController
{
    public function index() {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        $product_web_form = ProductWebForm::inputGroups(null);
        return $this->adminPagesView('product.index', compact('products', 'product_web_form'));
    }

    public function store(ProductWebRequest $request) {
        $product = new Product();

        if($request->id) {
            $product = Product::find($request->id);
        }

        $product->name = $request->name;
        $product->tn_id = $request->tn_id;
        $product->save();

        $this->edited();

        return redirect()->route('product.index');
    }
}

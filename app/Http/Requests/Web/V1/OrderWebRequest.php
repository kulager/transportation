<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class OrderWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:orders,id', 'nullable'],
            'driver_id' => ['required', 'numeric', 'exists:drivers,id'],
            'company_id' => ['required', 'numeric', 'exists:companies,id'],
            'address_id' => ['required', 'numeric', 'exists:addresses,id'],
            'second_driver_id' => ['numeric', 'exists:drivers,id', 'nullable'],
            'date' => ['date', 'required'],
            'car_brand' => ['string', 'required'],
            'car_number' => ['string', 'required'],
            'second_car_brand' => ['string', 'nullable'],
            'second_car_number' => ['string', 'nullable'],
            'products' => ['required', 'array'],
            'products.*.id' => ['required', 'numeric', 'exists:products,id', 'distinct'],
            'products.*.box' => ['required', 'numeric', 'exists:boxes,id'],
            'products.*.net_weight' => ['required', 'numeric'],
            'products.*.gross_weight' => ['required', 'numeric'],
            'products.*.place_quantity' => ['required', 'numeric'],
        ];
    }
}

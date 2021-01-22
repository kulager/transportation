<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ProductWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:products,id', 'nullable'],
            'name' => ['required', 'string'],
            'tn_id' => ['numeric', 'required']
        ];
    }
}

<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CompanyWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:companies,id', 'nullable'],
            'name' => ['required', 'string', 'nullable'],
            'second_name' => ['string', 'nullable'],
            'bin' => ['string', 'nullable'],
            'inn' => ['string', 'nullable'],
            'bik' => ['string', 'nullable'],
            'address_id' => ['numeric', 'exists:addresses,id', 'nullable'],

        ];
    }
}

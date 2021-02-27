<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;

class AddressWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:addresses,id', 'nullable'],
            'name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
        ];
    }
}

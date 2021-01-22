<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;

class CountryWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:countries,id', 'nullable'],
            'name' => ['required', 'string'],
            'second_name' => ['required', 'string']
        ];
    }

}

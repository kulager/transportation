<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;

class CityWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:cities,id', 'nullable'],
            'name' => ['required', 'string'],
            'second_name' => ['required', 'string'],
            'country_id' => ['required', 'numeric', 'exists:countries,id'],

        ];
    }
}

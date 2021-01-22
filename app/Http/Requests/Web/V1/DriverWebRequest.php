<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class DriverWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:drivers,id', 'nullable'],
            'full_name' => ['required', 'string'],
            'passport' => ['numeric', 'required'],
            'birth_date' => ['date', 'required'],
        ];
    }
}

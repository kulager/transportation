<?php

namespace App\Http\Requests\Web\V1;

use App\Http\Requests\Web\WebBaseRequest;

class BoxWebRequest extends WebBaseRequest
{
    public function injectedRules()
    {
        return [
            'id' => ['numeric', 'exists:boxes,id', 'nullable'],
            'name' => ['required', 'string'],
        ];
    }
}

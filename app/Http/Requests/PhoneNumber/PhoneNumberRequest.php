<?php

namespace App\Http\Requests\PhoneNumber;

use App\Http\Requests\BaseRequest;

class PhoneNumberRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|exists:Countries,code',
            'phone' => 'required|min:1',
        ];
    }
}

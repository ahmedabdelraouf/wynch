<?php

namespace App\Http\Requests\user;


use App\Http\Requests\Abstracts\AbstractFormRequest;

class LoginRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|regex:/(01)[0-9]{9}/',
            'password' => 'required'
        ];
    }
}

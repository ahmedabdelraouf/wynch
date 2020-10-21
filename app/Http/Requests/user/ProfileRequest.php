<?php

namespace App\Http\Requests\user;


use App\Http\Requests\Abstracts\AbstractFormRequest;

class ProfileRequest extends AbstractFormRequest
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
            'name' => 'sometimes|required',
            'email' => 'sometimes|required_without:phone|email|unique:users',
            'phone' => 'sometimes|required_without:email|unique:users|regex:/(01)[0-9]{9}/',
        ];
    }
}

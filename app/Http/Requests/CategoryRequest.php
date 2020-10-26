<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class CategoryRequest extends AbstractFormRequest
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
        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'name' => 'required|unique:categories',
                    'ar_name' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                break;
            case 'PUT':
                return [
                    'name' => 'sometimes|required|unique:categories',
                    'ar_name' => 'sometimes|required',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                break;
        }
    }
}

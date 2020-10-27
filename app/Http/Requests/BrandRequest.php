<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class BrandRequest extends AbstractFormRequest
{
    public static $store = [
        'name' => 'required|unique:categories',
        'category_id' => 'required|exists:categories,id',
        'ar_name' => 'required',
        'description' => 'string',
        'ar_description' => 'string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

    public static $update = [
        'name' => 'sometimes|required|unique:categories',
        'ar_name' => 'sometimes|required',
        'description' => 'sometimes|string',
        'ar_description' => 'sometimes|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ];

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
     * @return array
     */
    public static function getStore(): array
    {
        return self::$store;
    }

    /**
     * @return array
     */
    public static function getUpdate(): array
    {
        return self::$update;
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
                return self::$store;
                break;
            case 'PUT':
                return self::$update;
                break;
        }
        return [];
    }

    public static function getTransatableData(array $array)
    {
        return [
            'en' => [
                'name' => $array['name'],
                'description' => $array['description'],
            ],
            'ar' => [
                'name' => $array['ar_name'],
                'description' => $array['ar_description'],
            ],
            'image' => $array['image'],
            'category_id' => $array['category_id']
        ];
    }
}

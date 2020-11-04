<?php

namespace App\Http\Requests\Driver;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class DriverRequest extends AbstractFormRequest
{
    public static $store = [
        'name' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mobile' => 'required|regex:/(01)[0-9]{9}/|unique:drivers',
        'national_id' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'drug_test' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'driving_licence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'car_licence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public static $update = [
        'name' => 'sometimes',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'mobile' => 'sometimes|regex:/(01)[0-9]{9}/|unique:drivers',
        'national_id' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'drug_test' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'driving_licence' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'car_licence' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

}

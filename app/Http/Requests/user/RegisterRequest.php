<?php

namespace App\Http\Requests\user;


use App\Http\Requests\Abstracts\AbstractFormRequest;
use Dev\Application\Utility\UserGender;
use Dev\Application\Utility\UserType;

class RegisterRequest extends AbstractFormRequest
{
    public static $user = [
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'email' => 'required_without:phone|email|unique:users',
        'phone' => 'required_without:email|regex:/(01)[0-9]{9}/|unique:users',
        'password' => 'required|confirmed'
    ];

    public static $driver = [
        'national_id' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'drug_test' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'driving_licence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'car_licence' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $typeGenderValidation = [
            'type' => 'nullable|in:' . UserType::explodedTypes(),
            'gender' => 'required|nullable|in:' . UserGender::explodedGender()
        ];
        switch ($this->type) {
            case UserType::DRIVER:
                return array_merge($typeGenderValidation, self::$user, self::$driver);
                break;
            case UserType::USER:
            default:
                return array_merge($typeGenderValidation, self::$user);
                break;
        }
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Abstracts\AbstractFormRequest;

class UserVehicleRequest extends AbstractFormRequest
{
    public static $store = [
        'user_id' => 'required|exists:users,id',
        'vehicle_id' => 'required|exists:vehicles,id',
        'plate_number' => 'required|string',
    ];

    public static $update = [
        'user_id' => 'required|exists:users,id',
        'vehicle_id' => 'vehicles',
        'plate_number' => 'required|string'
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
            case 'PUT':
                return self::$update;
            default:
                return [];
        }
    }

}

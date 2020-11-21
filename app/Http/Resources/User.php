<?php

namespace App\Http\Resources;

use Dev\Application\Utility\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed type
 * @property mixed driver
 * @property mixed image
 * @property mixed phone
 * @property mixed email
 * @property mixed gender
 * @property mixed name
 * @property mixed id
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        $type = 0;
        switch ($this->type) {
            case UserType::DRIVER :
                $type = 1;
                break;
        }
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'gender' => $this->gender,
            'type' => $type,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image,
        ];
        switch ($this->type) {
            case UserType::DRIVER:
                return array_merge($data, ['driver' => new DriverResource($this->driver)]);
                break;
            case UserType::USER:
            default:
                return array_merge($data);
                break;
        }
    }
}

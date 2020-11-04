<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed id
 * @property mixed mobile
 * @property mixed image
 * @property mixed national_id
 * @property mixed drug_test
 * @property mixed car_licence
 * @property mixed driving_licence
 * @property mixed is_active
 */
class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'image' => $this->image,
            'national_id' => $this->national_id,
            'drug_test' => $this->drug_test,
            'car_licence' => $this->car_licence,
            'driving_licence' => $this->driving_licence,
            'is_active' => $this->is_active
        ];
    }
}

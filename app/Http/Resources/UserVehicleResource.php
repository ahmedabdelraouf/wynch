<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class VehicleResource
 * @package App\Http\Resources
 */
class UserVehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'vehicle' => new VehicleResource($this->vehicle),
            'plate_number' => $this->plate_number
        ];
    }
}

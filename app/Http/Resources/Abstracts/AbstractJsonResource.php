<?php
namespace App\Http\Resources\Abstracts;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractJsonResource extends JsonResource
{
    /**
     * 
     */
    abstract public function modelResponse() : array;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (is_null($this->resource)) {
            return [];
        }

        if (is_array($this->resource)) {
            return $this->resource;
        }

        return $this->modelResponse();
    }
}

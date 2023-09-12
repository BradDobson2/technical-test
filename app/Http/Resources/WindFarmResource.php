<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WindFarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'area' => $this->area->toWkt(),
            'turbines' => TurbineResource::collection($this->whenLoaded('turbines')),
        ];
    }
}

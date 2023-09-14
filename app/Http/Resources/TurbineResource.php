<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TurbineResource extends JsonResource
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
            'wind_farm_id' => $this->wind_farm_id,
            'name' => $this->name,
            'location' => $this->location->getCoordinates(),
            'components' => ComponentResource::collection($this->whenLoaded('components')),
            'inspections' => InspectionResource::collection($this->whenLoaded('inspections')),
        ];
    }
}

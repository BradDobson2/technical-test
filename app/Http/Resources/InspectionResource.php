<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InspectionResource extends JsonResource
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
            'turbine_id' => $this->turbine_id,
            'inspector_name' => $this->inspector_name,
            'inspection_date' => $this->inspection_date,
            'inspection_components' => InspectionComponentResource::collection(
                $this->whenLoaded('inspectionComponents')
            ),
        ];
    }
}

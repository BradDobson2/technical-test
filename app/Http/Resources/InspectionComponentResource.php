<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InspectionComponentResource extends JsonResource
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
            'inspection_id' => $this->inspection_id,
            'component_id' => $this->component_id,
            'component_grade_id' => $this->component_grade_id,
            'image_url' => $this->image_url,
        ];
    }
}

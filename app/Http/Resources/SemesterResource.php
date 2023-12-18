<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SemesterResource extends JsonResource
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
            'uuid' => $this->uuid,
            'center' => $this->center->name,
            'semester_number' => $this->semester_number,
            'semester_shuraka' => $this->resource->resources->count(),
            'muhazir' => $this->muhazir->first_name,
            'mawin_muhazir' => $this->mawin_muhazir->first_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'zone' => $this->zone->name,
        ];
    }
}

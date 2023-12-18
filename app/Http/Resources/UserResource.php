<?php

namespace App\Http\Resources;

use App\Models\Maliyat;
use App\Models\Region;
use App\Models\Resource;
use App\Models\Status;
use App\Models\Zone;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'firstname' => $this->first_name,
            'secondname' => $this->second_name,
            'zone' => $this->zone->name,
            'region' => $this->region->name,
            'dawati_status' => $this->dawatiStatus->name,
            'terbiati_status' => $this->tarbiatiStatus->name,
            'intizami_status' => $this->intizamiStatus->name,
            'maliyat' => $this->getNumber($this->maliyat),
            'user_id' => $this->user_id,
        ];
    }

    private function getNumber($money = null)
    {
        if (is_null($money)) return '';

        return number_format($money);
    }
}

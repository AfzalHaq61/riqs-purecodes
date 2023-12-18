<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RahimiaResource extends JsonResource
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
            'uuid' => $this->resource->rahimiaMonthly?->uuid,
            'firstname' => $this->resource->first_name,
            'secondname' => $this->resource->second_name,
            'dawati_status' => $this->resource->dawatiStatus->name,
            'terbiati_status' => $this->resource->tarbiatiStatus->name,
            'intizami_status' => $this->resource->intizamiStatus->name,
            'received_amount' => $this->getNumber($this->resource->rahimiaMonthly?->received_amount),
            'receipt_no' => $this->resource->rahimiaMonthly?->receipt_no,
        ];
    }

    private function getNumber($money = null)
    {
        if (is_null($money)) return '';

        return number_format($money);
    }
}

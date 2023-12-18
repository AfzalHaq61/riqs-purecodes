<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaliyatResource extends JsonResource
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
            'uuid' => $this->resource->maliyatMonthly?->uuid,
            'firstname' => $this->resource->first_name,
            'secondname' => $this->resource->second_name,
            'dawati_status' => $this->resource->dawatiStatus->name,
            'terbiati_status' => $this->resource->tarbiatiStatus->name,
            'intizami_status' => $this->resource->intizamiStatus->name,
            'fixed_amount' => $this->getNumber($this->resource->maliyatMonthly?->fixed_amount),
            'received_amount' => $this->getNumber($this->resource->maliyatMonthly?->received_amount),
            'receipt_no' => $this->resource->maliyatMonthly?->receipt_no,
            'arrears' => $this->getNumber($this->resource->maliyatMonthly?->arrears),
        ];
    }

    private function getNumber($money = null)
    {
        if (is_null($money)) return '';

        return number_format($money);
    }
}

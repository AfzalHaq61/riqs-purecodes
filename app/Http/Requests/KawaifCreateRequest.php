<?php

namespace App\Http\Requests;

use Composer\DependencyResolver\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class KawaifCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        $method = request()->method();
        if($method == 'POST') {
            $this->merge([
                'uuid' => Str::uuid()->toString(),
            ]);
        }
    }

    public function rules()
    {
        return [
            'uuid' => 'required|uuid',
            'first_name' => 'required|min:3|max:20|string',
            'second_name' => 'required|min:3|max:20|string',
            'father_name' => 'required|min:3|max:20|string',
            'email' => 'email|min:7|max:30|string',
            'phone_number' => 'required|min:11|max:20',
            'cnic' => 'required|min:13|max:20',
            'permanent_address' => 'required|min:15|max:250|string',
            'present_address' => 'required|min:15|max:250|string',
            'education' => 'required|min:15|max:250|string',
            'dawati_status_id' => 'required|exists:statuses,id',
            'tarbiati_status_id' => 'required|exists:statuses,id',
            'intizami_status_id' => 'required|exists:statuses,id',
            'region_id' => 'required|exists:regions,id',
            'zone_id' => 'required|exists:zones,id',
            'shehar_id' => 'required|exists:shehars,id',
            'halqa_id' => 'required|exists:halqas,id',
            'unit_id' => 'required|exists:units,id',
            'maliyat' => 'required|min:0|max:20|',
        ];
    }
}

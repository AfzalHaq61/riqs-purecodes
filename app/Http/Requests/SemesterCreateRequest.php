<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SemesterCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'center_id' => 'required|exists:centers,id',
            'semester_number' => 'required',
            'muhazir_id' => 'required|exists:resources,id',
            'mawin_muhazir_id' => 'required|exists:resources,id',
            'start_date' => 'required',
            'end_date' => 'required',
            'region_id' => '',
            'zone_id' => '',
        ];
    }
}

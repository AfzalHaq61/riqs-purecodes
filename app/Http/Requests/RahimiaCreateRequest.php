<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RahimiaCreateRequest extends FormRequest
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
            'resource_id' => 'required|exists:resources,id',
            'date' => 'required',
            'received_amount' => 'required|min:2|max:20',
            'received_by' => 'required|exists:resources,id',
            'receipt_no' => 'required|min:5|max:20',
        ];
    }
}

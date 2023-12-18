<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class MaliyatCreateRequest extends FormRequest
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
            'resource_id' => 'required|exists:resources,id',
            'date' => 'required',
            'fixed_amount' => 'required|min:2|max:20',
            'received_amount' => 'required|min:2|max:20',
            'recieved_by' => 'required|exists:resources,id',
            'receipt_no' => 'required|min:5|max:20',
            'arrears' => 'required|max:20',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaliyatPopupCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function rules()
    { 
        return [
            'maliyat' => 'required|numeric',
        ];
    }
}

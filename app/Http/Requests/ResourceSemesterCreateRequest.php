<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ResourceSemesterCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'resources' => 'array|required',
            'resources.*' => 'integer|exists:resources,id',
        ];
    }
}

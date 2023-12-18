<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function rules()
    { 
        return [
            'email' => 'required|email|min:7|max:30|string',
            'roles' => 'array|required',
            'roles.*' => 'integer|exists:roles,id',
            'password' => 'required|min:3|max:10|string',
            'confirm_password' => 'required|same:password',
        ];
    }
}

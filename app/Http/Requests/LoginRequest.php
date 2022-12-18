<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|max:255',
            'password' => 'required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'username.max' => 'Only 255 characters are allowed',
            'password.required' => 'Password is required',
        ];
    }
}

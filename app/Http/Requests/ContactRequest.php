<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|min:10',
            'message' => 'required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Only 255 characters are allowed',
            'email.email' => 'Please enter valid E-mail',
            'email.required' => 'E-mail is required',
            'email.max' => 'Only 255 characters are allowed',
            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject must be more than 10 characters.',
            'message.required' => 'Message is required',
        ];
    }
}

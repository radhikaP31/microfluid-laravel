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
            'email' => 'required|email|max:50',
            'country_code' => 'required',
            'contact_no' => 'required|min:5|max:20',
            'company_name' => 'required',
            'message' => 'required',
            'attachment' => 'nullable|max:500|mimes:pdf,doc,docx,jpeg,jpg,png,xlsx',
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
            'email.max' => 'Only 50 characters are allowed',
            'contact_no.required' => 'Contact Number is required',
            'contact_no.min' => 'Contact must be more than 5 characters',
            'contact_no.max' => 'Contact must be less than 20 characters',
            'company_name.required' => 'Company Name is required',
            'message.required' => 'Message is required',
            'country_code.required' => 'ISD Code is required',
            'attachment.file' => 'Attachment file limit is 500kb',
            'attachment.mimes' => 'Attachment file must be in pdf, doc, docx, jpeg, jpg, png or xlsx format.',
        ];
    }
}

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
            'contact.name' => 'required|max:255',
            'contact.email' => 'required|email|max:50',
            'contact.country_code' => 'required',
            'contact.contact_no' => 'required|min:5|max:20',
            'contact.company_name' => 'required',
            'contact.message' => 'required',
            'contact.attachment' => 'nullable|max:500|mimes:pdf,doc,docx,jpeg,jpg,png,xlsx',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     * @return array
     */
    public function messages()
    {
        return [
            'contact.name.required' => 'Name is required',
            'contact.name.max' => 'Only 255 characters are allowed',
            'contact.email.email' => 'Please enter valid E-mail',
            'contact.email.required' => 'E-mail is required',
            'contact.email.max' => 'Only 50 characters are allowed',
            'contact.contact_no.required' => 'Contact Number is required',
            'contact.contact_no.min' => 'Contact must be more than 5 characters',
            'contact.contact_no.max' => 'Contact must be less than 20 characters',
            'contact.company_name.required' => 'Company Name is required',
            'contact.message.required' => 'Message is required',
            'contact.country_code.required' => 'ISD Code is required',
            'contact.attachment.file' => 'Attachment file limit is 500kb',
            'contact.attachment.mimes' => 'Attachment file must be in pdf, doc, docx, jpeg, jpg, png or xlsx format.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'phone' => 'required|max:20|min:10',
            'company_name' => 'required|max:255',
            'postal_code' => 'required|max:50',
            'city' => 'required',
            'state_id' => 'required',
            'country_id' => 'required',
            'website' => 'nullable|url',
            'message' => 'required',
            'attachment' => 'nullable|mimes:jpg,png,jpeg,pdf,doc,docx,xls,xlsx|max:1024',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
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
            'phone.required' => 'Phone is required',
            'phone.max' => 'Phone number not valid',
            'company_name.required' => 'Company Name is required',
            'company_name.max' => 'Only 255 characters are allowed',
            'postal_code.required' => 'Postal Code is required',
            'postal_code.max' => 'Only 50 characters are allowed',
            'city.required' => 'City is required',
            'state_id.required' => 'State is required',
            'country_id.required' => 'Country is required',
            'website.url' => 'Please add valid url',
            'message.required' => 'Message is required',
            'attachment.max' => 'Max upload size is 1MB',
            'attachment.mimes' => 'Only jpg, png, jpeg, pdf, doc, docx, xls and xlsx are allowed',
        ];
    }
}

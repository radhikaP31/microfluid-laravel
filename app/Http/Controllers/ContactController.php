<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Common;
use App\Models\Contact;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
class ContactController extends Controller
{
    /**
     * contact page form
     * @return array
     */
    public function index()
    {
        $common = new Common();
        return view('contact.contact', [
            'country_code' => $common->getAllCountryCode(),
        ]);
    }

    /**
     * create Inquiry
     * @param object $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ContactRequest $request)
    {
        if ($request->method() == 'POST') {
            if ($request->hasFile('contact.attachment')) {
                // Run additional validation rules if file is uploaded
                $request->validate([
                    'contact.attachment' => 'required|file|max:500|mimes:pdf,doc,docx,jpeg,jpg,png,xlsx',
                ]);
            }
            $contact = new Contact();
            $contact->name = $request->contact['name'];
            $contact->email = $request->contact['email'];
            $contact->country_code = $request->contact['country_code'];
            $contact->contact_no = $request->contact['contact_no'];
            $contact->company_name = $request->contact['company_name'];
            $contact->attachment = $request->contact['attachment']->getClientOriginalName();
            $contact->message = $request->contact['message'];
            $result = $contact->save();

            if ($request->hasFile('contact.attachment')) {
                //upload contact attachment
                $attachmentName = $contact->id . '_' . $contact->attachment;
                $request->contact['attachment']->storeAs('public/attachment/contact', $attachmentName); //storage/app/public/attachment/contact
                $contact_data = Contact::find($contact->id);
                $contact_data->attachment = '/public/attachment/contact/' . $attachmentName;
                $contact_data->save();
            }

            if ($result) {
                //SMTP configure for send email to user and admin
                $body = [
                    'name' => $request->contact['name'],
                ];
                Mail::to($request->contact['email'])->send(new ContactMail($body));
                $request->session()->flash('success', 'Your Contact Request is saved!! We will connect you shortly..');

                return redirect()->route('home');
            } else {
                $request->session()->flash('error', 'Your Contact Request not saved. Please check!!');

                return redirect()->route('contact');
            }
        }
    }

    /**
     * create Quote Inquiry
     * @param object $request
     *
     * @return \Illuminate\View\View
     */
    public function quoteAdd(HttpRequest $request)
    {
        if ($request->method() == 'POST') {

            $rules = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:50',
                'contact_number' => 'required|min:5|max:20',
                'company_name' => 'required',
                'message' => 'required',
            ]);

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->contact_no = $request->contact_number;
            $contact->company_name = $request->company_name;
            $contact->message = $request->message;
            $contact->record_from = 'quote';
            $result = $contact->save();

            if ($result) {
                //SMTP configure for send email to user and admin
                $body = [
                    'name' => $request->name,
                ];
                Mail::to($request->email)->send(new ContactMail($body));
                $request->session()->flash('success', 'Your Contact Request is saved!! We will connect you shortly..');

                return redirect()->route('home');
            } else {
                $request->session()->flash('error', 'Your Contact Request not saved. Please check!!');

                return redirect()->route('contact');
            }
        }
    }
}

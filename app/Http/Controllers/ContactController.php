<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Common;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

use function Psy\debug;

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
     * @param Array $request
     *
     * @return \Illuminate\View\View
     */
    public function create(ContactRequest $request)
    {
        if ($request->method() == 'POST') {
            if ($request->hasFile('attachment')) {
                // Run additional validation rules if file is uploaded
                $request->validate([
                    'attachment' => 'required|file|max:500|mimes:pdf,doc,docx,jpeg,jpg,png,xlsx',
                ]);
            }

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->country_code = $request->country_code;
            $contact->contact_no = $request->contact_no;
            $contact->company_name = $request->company_name;
            $contact->attachment = $_FILES['attachment']['name'];
            $contact->message = $request->message;
            $result = $contact->save();

            if ($request->hasFile('attachment')) {
                //upload contact attachment
                $attachmentName = $contact->id . '_' . $request->attachment->getClientOriginalName();
                $request->attachment->storeAs('public/attachment/contact', $attachmentName); //storage/app/public/attachment/contact
                $contact_data = Contact::find($contact->id);
                $contact_data->attachment = '/public/attachment/contact/' . $attachmentName;
                $contact_data->save();
            }

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

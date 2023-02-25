<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * contact page form
     * @return array
     */
    public function index()
    {
        return view('contact.contact', [
            'data' => 'hello contact',
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

            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
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
                $request->session()->flash('error', 'Your contact not saved. Please check!!');
                return redirect()->route('contact');
            }
        }
    }
}

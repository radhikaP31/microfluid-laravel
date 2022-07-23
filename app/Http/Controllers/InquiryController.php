<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Common;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
   /**
     * Add Inquiry.
     *
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        if ($request->method() == 'POST') {

            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|numeric|max:255|min:10',
                'company_name' => 'required|max:255',
                'postal_code' => 'required|max:255',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'website' => 'required',
                'message' => 'required',
                'image' => 'required|mimes:jpg,png,jpeg,pdf,doc,docx,xls|max:1024',
            ]);

            $inquiry = new Inquiry;
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->phone = $request->phone;
            $inquiry->company_name = $request->company_name;
            $inquiry->company_address = $request->company_address;
            $inquiry->postal_code = $request->postal_code;
            $inquiry->city = $request->city;
            $inquiry->state = $request->state;
            $inquiry->country = $request->country;
            $inquiry->website = $request->website;
            $inquiry->message = $request->message;
            $inquiry->is_whatsapp_no = $request->is_whatsapp_no;
            $inquiry->attachment = $_FILES['attachment']['name'];
            $result = $inquiry->save();

            if ($request->hasFile('attachment')) {

                //upload profile picture
                $attachmentName = $inquiry->id . '_' . $request->attachment->getClientOriginalName();
                $request->attachment->storeAs('public/inquiry_attachment/', $attachmentName);

                $inquiry_data = Inquiry::find($inquiry->id);
                $inquiry_data->attachment = $attachmentName;
                $result = $inquiry_data->save();
            }

            if ($result) {
                //SMTP configure for send email to user and admin
               /*  
                QueueJob::dispatch($request->email); */

                $request->session()->flash('success', 'Inquiry saved!! We will connect you shortly..');
                return redirect()->route('home');
            } else {

                $request->session()->flash('error', 'Inquiry not saved. Please check!!');
                return redirect()->route('inquiry');
            }
        } else {
            $common = new Common;
            return view('inquiry.inquiry', [
                'country' => $common->getAllCountry(),
                'state' => $common->getAllState(),
            ]);
        }
    }
}

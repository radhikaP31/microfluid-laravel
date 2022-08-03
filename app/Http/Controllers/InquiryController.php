<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\Inquiry;
use App\Models\Common;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * get all state data for ajax request
     * @param $country_id integer
     * return array
     */
    public function getAllState($country_id=0){
        $common = new Common;
        $data = $common->getAllState($country_id);
        $optionHtml = "<option>Select a State</option>";
        foreach ($data as $key => $state) {
            $optionHtml .=  "<option value='" . $state->id . "'>" . $state->name . "</option>";
        }
        return $optionHtml;
    }

    /**
     * Add Inquiry.
     *
     * @return \Illuminate\View\View
     */
    public function add()
    {
        $common = new Common;
        return view('inquiry.inquiry', [
            'country' => $common->getAllCountry(),
            'state' => $common->getAllState(),
        ]);
    }
    /**
     * create Inquiry.
     *
     * @return \Illuminate\View\View
     */
    public function create(InquiryRequest $request)
    {
        if ($request->method() == 'POST') {

            //  $validated = $request->validate([

            /* 'uploadedImages' => [
                    'nullable',
                    function ($attribute, $value, $fail) {
                        foreach ($value as $image) {
                            if (strpos($image['path'], "base64") !== false) {
                                $extesion = explode(";", explode("/", $image['path'])[1])[0];
                                if (!in_array($extesion, ['jpeg', 'jpg', 'png', 'gif'])) {
                                    $fail("The image must be a file of type: jpeg, jpg, png, gif.");
                                }
                            }
                        }
                    },
                    function ($attribute, $value, $fail) {
                        foreach ($value as $image) {
                            if ((strpos($image['path'], "base64") !== false) && (strlen(base64_decode($image['path'])) > 5000000)) {
                                $fail("The image size may not be greater than 5MB.");
                            }
                        }
                    },
                    function ($attribute, $value, $fail) {
                        if (count($value) > 10) {
                            $fail("Please upload up to 10 images.");
                        }
                    },
                ], */
            //]);
            $inquiry = new Inquiry;
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->phone = $request->phone;
            $inquiry->is_whatsapp_no = $request->is_whatsapp_no;
            $inquiry->company_name = $request->company_name;
            $inquiry->company_address = $request->company_address;
            $inquiry->postal_code = $request->post_code;
            $inquiry->city = $request->city;
            $inquiry->state_id = $request->state_id;
            $inquiry->country_id = $request->country_id;
            $inquiry->website = $request->website;
            $inquiry->message = $request->message;
            $inquiry->is_whatsapp_no = $request->is_whatsapp_no;
            $inquiry->attachment = $_FILES['attachment']['name'];
            $result = $inquiry->save();

            // if ($request->hasFile('attachment')) {

            //     //upload profile picture
            //     $attachmentName = $inquiry->id . '_' . $request->attachment->getClientOriginalName();
            //     $request->attachment->storeAs('public/inquiry_attachment/', $attachmentName);

            //     $inquiry_data = Inquiry::find($inquiry->id);
            //     $inquiry_data->attachment = $attachmentName;
            //     $result = $inquiry_data->save();
            // }

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
            dd('test');
            $common = new Common;
            return view('inquiry.inquiry', [
                'country' => $common->getAllCountry(),
                'state' => $common->getAllState(),
            ]);
        }
    }
}

@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>Greetings of the day.</p>
<p>Thank you for connecting us!!</p>
<p>Your contact request received successfully.. We'll get back to you soon..</p>
Thanks & Regards,<br>
{{ config('app.full_name') }}
@endcomponent
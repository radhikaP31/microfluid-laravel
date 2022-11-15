@component('mail::message')
<h2>Hello {{$body['name']}},</h2>
<p>Your inquiry received successfully.. We'll get back to you soon..</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
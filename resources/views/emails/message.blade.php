@component('mail::message')
#Dear {{ $data['receiver_name']}}, You've got a new message.

<p>{{ auth()->user()->u_name}} sent you the following message:</p>
<p>{{ $data['message']}}</p>
<p>Kindly head to your inbox to reply.</p>
<br><br>
<p>Warm Regards,</p>
<p><strong>The {{config('app.name')}} Team</strong></p>
<small>Have any complaint regarding our service or activities on our platform? Contact us on <a href="mailto:amaslink@gmail.com?Subject=Hello Amaslink, I Have an Enquiry">amaslink@gmail.com</a></small>
@endcomponent
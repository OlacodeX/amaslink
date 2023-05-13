@component('mail::message')
# Hello {{ $data['bidder_name']}},
<p>Your bid on item {{ $data['listing_title']}} has been accepted.</p>
<p>Kindly Contact Auctioner with the details below to finalize the process:</p>
<p><strong>Email: </strong><a href="mailto:{{ $data['listing_email']}}">{{ $data['listing_email']}}</a></p>
<p><strong>Phone Number: </strong><a href="tel:{{ $data['listing_phone']}}">{{ $data['listing_phone']}}</a></p>
<br><br>
<p>Warm Regards,</p>
<p><strong>{{config('app.name')}}</strong></p>
<hr>
<small>Have any complaint regarding our service or the sales? Contact us on <a href="mailto:amaslink@gmail.com?Subject=Hello Amaslink, I Have an Enquiry">amaslink@gmail.com</a></small>
@endcomponent
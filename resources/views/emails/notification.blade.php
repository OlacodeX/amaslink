@component('mail::message')
# Hello Amaslink Classified,
<p>Listing "{{ $data['title']}}" is awaiting your approval.</p>
<br><br>
<p>Warm Regards,</p>
<p><strong>The {{config('app.name')}} Team</strong></p>
<small>Have any complaint regarding our service or activities on our platform? Contact us on <a href="mailto:amaslink@gmail.com?Subject=Hello Amaslink, I Have an Enquiry">amaslink@gmail.com</a></small>
@endcomponent
@component('mail::message')
#Dear {{ $data['u_name']}},
#We at Amaslink Classified are happy to welcome you on board.
<p>We hope you do enjoy using our platform.</p>
<p>Below are your login credentials:</p>
 <p>Email: <strong>{{ $data['email']}}</strong>
<p>Password: <strong>{{ $data['password']}}</strong></p>
<p>To secure your account please keep your credentials safe.</p>
<br><br>
<p>Warm Regards,</p>
<p><strong>The {{config('app.name')}} Team</strong></p>
<small>Have any complaint regarding our service or activities on our platform? Contact us on <a href="mailto:amaslink@gmail.com?Subject=Hello Amaslink, I Have an Enquiry">amaslink@gmail.com</a></small>
@endcomponent
@component('mail::message')
# You have received the following request.

# Hello Amaslink Classified,

 <p>My name is <strong>{{ $data['name']}},</strong>
<p>My Request/Enquiry/Question:</p>
<p><strong>{{ $data['message']}}</strong></p>
<p>My Contact Details are below:</p>
<p><strong>Email: </strong><a href="mailto:{{ $data['email']}}">{{ $data['email']}}</a></p>
<p><strong>Phone Number: </strong><a href="tel:{{ $data['number']}}">{{ $data['number']}}</a></p>
<br><br>
<p>Warm Regards,</p>
<p><strong>{{config('app.name')}}</strong></p>
@endcomponent
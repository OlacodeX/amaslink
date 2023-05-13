@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads| Reach Out
@endsection
@include('inc.css.contact')
@section('content')
    @section('content')
    @include('inc.navother')
    <div class="container-fluid contact">
              
              <h3 class="text-justify contact">Contact Us</h3>
              <div class="row text-center icon">
                  <div class="col-sm-3">
                      <p><i class="fa fa-phone" style="color:#b20000;"></i><br>Phone <br><small><a href="tel:479471632">+479471632</a></small></p>
                  </div>
                  <div class="col-sm-3">
                      <p><i class="fa fa-envelope" style="color:#b20000;"></i><br>Email <br><small><a href="mailto:support@amaslink.com?Subject=Hello Amaslink, I Have an Enquiry">support@amaslink.com</a></small></p>
                  </div>
                  <div class="col-sm-3">
                      <p><i class="fa fa-chain" style="color:#b20000;"></i><br>Website Address<br><small><a href="https://amaslink.com">www.amaslink.com</a></small></p>
                  </div>
                  <div class="col-sm-3">
                      <p><i class="fa fa-map-marker" style="color:#b20000;"></i><br>Visit Us <br> <small>Kristiansand Norway</small></p>
                  </div>
              </div>
              <div class="row cont">
                @include('inc.messages')
                    <div class="col-sm-6 text-justify">
                     {!! Form::open(['method' => 'post', 'action' => 'ContactMailController@store']) !!}
                        <div class="form-group">
                            {{Form::text('name', '', [ 'class' => 'form-control', 'placeholder' => 'Your full name.....', 'required'])}}
                        </div>
                        <div class="form-group">
                            {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'Your email.....', 'required'])}}
                        </div>
                        <div class="form-group">
                            {{Form::number('number', '', [ 'class' => 'form-control', 'placeholder' => 'Your phone number.....', 'required'])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group"> 
                            {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Your Message.....', 'required'])}}
                        </div>
                        @csrf
                        {{Form::submit('Send Message', ['class' => 'btn btn-success btn-md pull-right'])}}
                     {!! Form::close() !!}
                    </div>
                </div>
              <h3 class="text-justify connect">Connect With Us On Social Media</h3>
              <p class="social">
                    <a href="https://www.facebook.com/"> <i class="fa fa-facebook" style="color:  rgb(1, 14, 128); font-weight:300;padding-right:5px;padding-bottom:15px;"></i></a> 
                    <a href="https://www.twitter.com/Amaslink1"><i class="fa fa-twitter" style="color:  rgb(27, 188, 228); font-weight:300;padding-right:5px;padding-bottom:15px;"></i></a> 
                    <a href="https://www.youtube.com/channel/UCtr6z1xfyPLNSzzYUwMZCvQ" style="color:#aa1313;"><i class="fa fa-youtube-play"></i></a>
                    <a href="https://www.instagram.com/amaslink3"><i class="fa fa-instagram" style="color:  rgb(212, 12, 12); font-weight:300;padding-right:5px;"></i></a> 
                    <a href="https://api.whatsapp.com/send?phone=479471632"><i class="fa fa-whatsapp" style="color:  rgb(13, 228, 85); font-weight:300;padding-right:5px;"></i></a> 
              
              </p>
    
              <div class="row">
                @include('inc.footer')
             </div>
@endsection
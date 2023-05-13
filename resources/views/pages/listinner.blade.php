@extends('layouts.main')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Listings
@endsection
@include('inc.css.listinner')
@section('content')
@include('inc.navother')
<div class="row">
    <div class="container-fluid listing">
        <div class="col-sm-9">
            <div class="col-sm-4 bb">
                <img src="img/back.png" alt="" class="img-responsive">
                <div class="top-left">
                    <span class="btn btn-primary">FEATURED</span>
                </div>
            </div>
            <div class="col-sm-8 bb text-justify">
                <div class="col-sm-8">
                    <small class="text-justify"><i class="fa fa-bookmark-o"></i><a href="">Brands</a></small>
                    <hr>
                    <small class="text-justify"><i class="fa fa-cubes"></i>Genuine SBLC/BG Avai</small>
                    <hr>
                    <small class="text-justify"><i class="fa fa-map-marker"></i>USA</small><br>
                    <small class="text-justify one"><i class="fa fa-tags"></i>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                         Nec feugiat nisl pretium fusce id velit. Viverra justo nec ultrices dui sapien. 
                         Arcu non sodales neque sodales ut. Massa sapien faucibus et molestie ac.
                          Interdum velit laoreet id donec ultrices.
                    </small>
                </div>
                <div class="col-sm-4">
                    @include('inc.messages')
                    <button class="open-button btn btn-success btn-md" onclick="openForm()">MESSAGE SELLER</button>

<div class="chat-popup" id="myForm">
    <!---If file upload is involved always add enctype to your opening
        form tag and set it to multipart/form-data--->
   {!! Form::open(['action' => 'MessagingController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) /** The action should be the block of code in the store function in PostsController
   **/ !!}<br>
    <div class="form-group">
            <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
        {{Form::label('message', 'Your Message')}}<br>
        <!--This is the input field with type=textarea, name=body, value='' since it is a text field, then bootstrap class and then placeholder--->
        {{Form::textarea('message', '', ['class' => 'form-control'])}}
    </div>
    {{Form::hidden('receiver_id', /**$post->user_id**/ '2')}}
    {{Form::submit('Send Message', ['class' => 'btn btn-primary btn-md', 'style' => 'text-transform:uppercase;'])}}
    <br><br>
    <button type="button" class="btn cancel btn-danger" onclick="closeForm()">Cancel</button>
    {!! Form::close() !!}
</div>
                    <hr>
                    <a href="" class="btn btn-success btn-md">SELLER PROFILE</a>
                </div>
            </div>
            <hr>
    </div>
        <div class="col-sm-3">
            
            <h3 class="title">Categories</h3>
            <hr class="hrr">
            
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GeT', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'CURRENCY TRADING')}}
                 {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'MINERAL,CRUDE OIL')}}
                 {{Form::submit('MINERAL,CRUDE OIL', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'BUSINESS SALES')}}
                 {{Form::submit('BUSINESS SALES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'MOBILE,ELECTRONICS')}}
                 {{Form::submit('MOBILE,ELECTRONICS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'SEEKING JOBS/CV')}}
                 {{Form::submit('SEEKING JOBS/CV', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'REAL ESTATE,LANDS')}}
                 {{Form::submit('REAL ESTATE, LANDS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'AUTOMOBILES')}}
                 {{Form::submit('AUTOMOBILES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'KIDS AND BABIES')}}
                 {{Form::submit('KIDS AND BABIES', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'SPORT')}}
                 {{Form::submit('SPORT', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            <h3 class="title">Tags</h3>
            <hr class="hrr">
            <a href="./Posts" class="btn btn-default">Blog</a>
            <a href="./communities" class="btn btn-default">Forum</a>
            <a href="./alllistings" class="btn btn-default">Ad Listings</a>
            <a href="./contact" class="btn btn-default">Talk To Us</a>
            </div>
        </div>
        
    </div>
</div>
@include('inc.footer')

<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
    
@endsection
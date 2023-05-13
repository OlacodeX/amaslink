@extends('layouts.main')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | {{$listing->title}}
@endsection
<style>
  
    
  div.col-sm-3{
      display:none;
  }
  #loadMoree {
      transition: all 600ms ease-in-out;
      -webkit-transition: all 600ms ease-in-out;
      -moz-transition: all 600ms ease-in-out;
      -o-transition: all 600ms ease-in-out;
      text-transform: uppercase;
  }
  
      .container{
                  width: 68%;
              }
              h6{
                  color: #B2000093;
              }
            .container a{
                  text-decoration: none;
                  color: #B2000093;
              }
              
             .fa{
                  font-weight: bold;
                  color: #B2000093;
              }
              div.top-left {
              position: absolute;
              top: 15px;
              left: 0px;
              border-radius: 0;
              text-transform: lowercase;
          }
          div.top-left .btn.btn-primary {
              background: tomato;
              border: none;
              font-size: 11px;
              letter-spacing: 3px;
              padding: 5px 22px;
              border-radius: 0;
          }
          .panel-default .panel-footer{
              height: 90px;
          }
         .panel-default .panel-footer p{
              color:#171919d3;
              font-size: 12px;
              padding-top: 0px;
              padding-bottom: 10px;
              font-weight: bold;
          }
          .panel-default .panel-footer p span{
              color:#171919d3;
              font-size: 10px;
              font-weight: normal;
          }
          .panel-default .panel-footer small{
              color:#171919d3;
              font-size: 10px;
              font-weight: normal;
              padding-bottom: 0;
              margin-bottom: 0;
          }
         .panel-default .panel-footer hr{
              padding-top: 0;
              margin-top: 0;
              margin-bottom: 0;
          }
             div.panel-default{
                  width: auto;
                  margin-bottom: 20px;
                  box-shadow: 10px 6px 6px 0 rgba(0, 0, 0, 0.2);
              }
             div.panel-default div.panel-body{
                  margin-bottom: 0;
                  height: 200px;
                  width: 300px;
                  padding: 0;
              }
  .image {
    display: block;
    width: 100%;
    height: auto;
  }
  
  div.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 65%;
    width: 260px;
    opacity: 0;
    transition: .3s ease;
    background-color: #b20000bb;
    color: #eee;
  }
  div.overlay p{
      padding-top: 50px;
  }
  div.container.folio:hover div.overlay {
    opacity: 1;
  }
  
  a.icon i.fa.fa-plus-circle{
    color: #eee;
    font-size: 80px;
    position: absolute;
    left: 50%;
    font-weight: bold;
    top: 80px;
    padding-bottom: 0px;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }
  div.container.folio {
    position: relative;
    width: 100%;
    margin: 0;
    padding: 0;
  }
              .panel-default .panel-footer{
                  margin-bottom: 0;
                  width: 260px;
              }
              .panel-default .panel-footer .fa{
                  font-weight: bold;
                  color: #B20000;
  
              }
              .panel-default .panel-body img{
                  margin-bottom: 0;
                  height:200px;
                  width: 260px;
                  background: #171919;
              }
   /* Bottom left text */
   .bottom-left {
              position: absolute;
              bottom: 108px;
              left: 15px;
              background: #f1f1f1;
              color: #b20000;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
                 /* Bottom right text */
   div.bottom-right {
              position: absolute;
              bottom: 80px;
              left: 188px;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
                 /* Bottom right text */
   div.bottom-right:hover {
              position: absolute;
              bottom: 80px;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
          .bottom-right form button{
              background: #f1f1f1;
              border-radius: 10px;
              border: none;
              z-index: 99;
          } 
          .bottom-right form button:hover{
              background: #f1f1f1;
              border-radius: 10px;
              border: none;
              z-index: 99;
          }     
      h2.title{
          color: #171919;
          font-weight: bold;
          padding-top: 20px;
          padding-bottom: 20px;
      }
      a.btn.btn-success{
          background: transparent;
          border: #B20000 solid 1px;
          color: #B20000;
          border-radius: 0;
          margin-top: 20px;
      }
      a.btn.btn-success:hover{
          background: #B20000;
          border: #B20000 solid 1px;
          color: #f1f1f1;
          border-radius: 3px;
      }
    div.carousel.slide div.item img{
      height: 300px;
    }
    div.carousel.slide div.item .embed-responsive{
      height: 300px;
    }
      .container-fluid.listing{
          padding-top: 50px;
          padding-left: 50px;
      }
      .col-sm-3{
          padding-right: 0;
          
      }
      .col-sm-9{
          padding-right: 200px;
          padding-left: 0;
          margin-top: 10px;
          padding-top: 20px;
          margin-bottom: 30px;
          box-shadow: 5px 0px 5px 0px rgba(0, 0, 0, 0.2);
          padding-bottom: 100px;
      }
      .col-sm-9:hover{
          box-shadow:none;
      }
      .col-sm-8.bb .fa{
  font-weight: bold;
  color: #B20000;
  
  }
  
  .top-left {
  position: absolute;
  top: 15px;
  left: 15px;
  border-radius: 0;
  text-transform: lowercase;
  }
  .top-left .btn.btn-primary {
  background: tomato;
  border: none;
  font-size: 11px;
  letter-spacing: 3px;
  padding: 5px 20px;
  border-radius: 0;
  }
  input.btn.btn-primary {
  background: tomato;
  border: none;
  font-size: 11px;
  letter-spacing: 3px;
  padding: 5px 22px;
  border-radius: 0;
  }
  textarea.form-control{
      height: 100px;
      width: 160px;
  }
      /* The popup chat - hidden by default */
      .chat-popup {
    display: none;
  }
  
  
  .btn.btn-success{
  background: tomato;
  border: none;
  font-size: 11px;
  letter-spacing: 3px;
  padding: 5px 22px;
  border-radius: 0;
  }
  a.btn.btn-success:hover,
  button.open-button.btn.btn-success:hover,
  input.btn.btn-primary:hover{
  background: transparent;
  border: 1px solid #b20000;
  font-size: 11px;
  letter-spacing: 3px;
  padding: 5px 22px;
  border-radius: 0;
  color: #B20000;
  }
  button.open-button.btn.btn-success{
  background: tomato;
  border: none;
  font-size: 11px;
  letter-spacing: 3px;
  padding: 5px 22px;
  border-radius: 0;
  }
  input.btn.btn-default{
  background: transparent;
  border-radius: 0;
  font-size: 13px;
  border: 1px solid #b20000;
  color: #b20000;
  margin-bottom: 10px;
  }
  .col-sm-8.bb,
  .col-sm-4.bb
  {
      margin-bottom: 0px;
  }
  .col-sm-8.bb .col-sm-4
  {
      padding-bottom: 10px;
  }
  img.img-responsive{
      width: 200px;
      height: 200px;
  }
  @media only screen and (max-width: 768px) {
    .row.ads .container{
                  width: 100%;
              }
  
      .row.ads .panel-default .panel-footer p{
              color:#171919d3;
              font-size: 10px;
              padding-top: 0px;
              padding-bottom: 10px;
              font-weight: bold;
          }
          .row.ads .panel-default .panel-footer p span{
              color:#171919d3;
              font-size: 10px;
              font-weight: normal;
          }
          .row.ads .panel-default .panel-footer small{
              color:#171919d3;
              font-size: 10px;
              font-weight: normal;
              padding-bottom: 0;
              margin-bottom: 0;
          }
          
   /* Bottom left text */
   .bottom-left {
              position: absolute;
              bottom: 108px;
              left: 15px;
              background: #f1f1f1;
              color: #b20000;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
          /* Bottom right text */
   div.bottom-right {
              position: absolute;
              bottom: 80px;
              left: 108px;
              color: #f1f1f1;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
   div.bottom-right:hover {
              position: absolute;
              bottom: 80px;
              left: 108px;
              color: #f1f1f1;
              padding-left: 15px;
              padding-right: 15px;
              z-index: 99;
          }
          .bottom-right form button{
              background: #f1f1f1;
              border-radius: 10px;
              color: #f1f1f1;
              border: none;
              z-index: 99;
          } 
          .bottom-right form button:hover{
              background: #f1f1f1;
              border-radius: 10px;
              color: #f1f1f1;
              border: none;
              z-index: 99;
          } 
       div.col-sm-3{
          float: left;
          width: 50%;
              }
      .container{
                  width: 100%;
              }
          .panel-default .panel-footer p{
              color:#171919d3;
              font-size: 10px;
              padding-top: 0px;
              padding-bottom: 10px;
              font-weight: bold;
          }
         .panel-default .panel-footer p span{
              color:#171919d3;
              font-size: 8px;
              font-weight: normal;
          }
           .panel-default .panel-footer small{
              color:#171919d3;
              font-size: 8px;
              font-weight: normal;
              padding-bottom: 0;
              margin-bottom: 0;
          }
  div.overlay {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 65%;
    width: 160px;
    opacity: 0;
    transition: .3s ease;
    background-color: #b20000bb;
    color: #eee;
  }
              div.row.ads div.panel-default div.panel-body{
                  margin-bottom: 0;
                  height: 200px;
                  width: 160px;
                  padding: 0;
              }
              .panel-default .panel-footer{
                  margin-bottom: 0;
                  width: 160px;
                  padding-bottom: 50px;
              }
              .panel-default .panel-footer .fa{
                  font-weight: bold;
                  color: #B20000;
  
              }
              .panel-default .panel-body img{
                  margin-bottom: 0;
                  height:200px;
                  width: 200px;
              }
  
      div.col-sm-9{
          padding: auto;
          margin: auto;
          box-shadow: 5px 0px 5px 0px rgba(0, 0, 0, 0.2);
      }
  
      div.container-fluid.listing{
          padding: auto;
          width: 100%;
      }
      }
  
  </style>
@section('content')
@include('inc.navotherr')
<div class="row">
    <div class="container-fluid listing">
        <div class="col-sm-9">
          @include('inc.messages')
            <div class="col-sm-4 bb">
              @if ($listing->type == 'paid')
                  
              <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="500000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  <li data-target="#myCarousel" data-slide-to="3"></li>
                  <li data-target="#myCarousel" data-slide-to="4"></li>
                  @if (!empty($listing->video))
                  <li data-target="#myCarousel" data-slide-to="5"></li>
                  @endif
                </ol>
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image1)}}" alt="{{$listing->title}} first image">
                  </div>
              
                  <div class="item">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image2)}}" alt="{{$listing->title}} second image">
                  </div>
              
                  <div class="item">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image3)}}" alt="{{$listing->title}} third image">
                  </div>
                  <div class="item">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image4)}}" alt="{{$listing->title}} fourth image">
                  </div>
                  <div class="item">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image5)}}" alt="{{$listing->title}} fifth image">
                  </div>
              
                  @if (!empty($listing->video))
                  <div class="item video">
                    <div class="embed-responsive">
                        <iframe class="embed-responsive-item" src="{{URL::to($listing->video)}}" allowfullscreen></iframe>
                    </div>
                  </div>
                    
                  @endif
                </div>
              
                <!-- Left and right controls-->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a> 
              </div>
              @endif
              @if ($listing->type == 'free' && $listing->priority == 'Yes')
                  
              <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  @if (!empty($listing->video))
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                  @endif

                </ol>
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image1)}}" alt="{{$listing->title}} first image">
                  </div>
              
                  <div class="item">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image2)}}" alt="{{$listing->title}} second image">
                  </div>
              @if (!empty($listing->video))
                <div class="item video">
                  <div class="embed-responsive">
                      <iframe class="embed-responsive-item" src="{{URL::to($listing->video)}}" allowfullscreen></iframe>
                  </div>
                </div>
                  
                @endif
                </div>
                <!-- Left and right controls-->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a> 
              </div>
              @endif
              @if ($listing->type == 'free' && $listing->priority == 'No')
                  
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators 
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                </ol>-->
              
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="{{ URL::to('img/cover_images/listings/'.$listing->image1)}}" alt="{{$listing->title}} first image">
                  </div>
              
                </div>
              
                <!-- Left and right controls
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a> -->
              </div>
              @endif
            </div>
            <div class="col-sm-8 bb text-justify">
                <div class="col-sm-8">
                  <h3 class="text-justify">{{$listing->title}}</h3>
                    <i class="fa fa-mars"></i>Category <br>
                    <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->category}}</small>
                    @if ($listing->subcategory !== 'N/A')
                    <i class="fa fa-mars-double"></i>subcategory <br>
                    <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->subcategory}}</small>
                    @endif
                    <hr>
                    @if (!empty($listing->price))
                    <i class="fa fa-dollar"></i>Price <br>
                   <i class="fa fa-angle-double-right"></i><small class="text-justify">${{$listing->price}}</small>
                    @endif
                    <h5><i class="fa fa-dropbox"></i>Payment Method(s)</h5>

                    @if (!empty($listing->payment_method1))
                     <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method1}}</small>
                     @endif <br>
                     @if (!empty($listing->payment_method2))
                     <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method2}}</small>
                      @endif <br>
                    @if (!empty($listing->payment_method3))
                     <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method3}}</small>
                    @endif <br>
                    @if (!empty($listing->payment_method4))
                    <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method4}}</small>
                    @endif <br>
                    @if (!empty($listing->payment_method5))
                      <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method5}}</small>
                      @endif <br>
                      @if (!empty($listing->payment_method6))
                      <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->payment_method6}}</small>
                        @endif <br>
                    <hr>
                    <i class="fa fa-map-signs"></i>Address(es) <br>
                    <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->address1}}, {{$listing->country}},</small><br>
                    @if (!empty($listing->address2))
                    <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->address2}}</small>
                    @endif <br>
                    @if (!empty($listing->condition))
                    <i class="fa fa-align-center"></i> Condition
                   <br> <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->condition}}</small>
                    @endif <br>
                    @if ($listing->gender !== 'N/A')
                    <i class="fa fa-female"></i> Gender
                   <br><i class="fa fa-angle-double-right"></i> <small class="text-justify"><i class="fa fa-female"></i>{{$listing->gender}}</small>
                    @endif

                    @if (!empty($listing->purpose))
                    <i class="fa fa-gg"></i> Purpose
                   <br> <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->purpose}}</small>
                    @endif
                    @if ($listing->property_type !== 'N/A')
                    <i class="fa fa-hashtag"></i> Property Type
                   <br> <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->property_type}}</small>
                    @endif
                    @if (!empty($listing->land_area))
                    <i class="fa fa-area-chart"></i> Land Area
                   <br> <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->land_area}}</small>
                    @endif
                    @if ($listing->bedrooms !== 'N/A')
                   <br> <small class="text-justify"><i class="fa fa-object-ungroup"></i>{{$listing->bedrooms}} bedrooms</small>
                    @endif <br>
                    @if ($listing->bathrooms !== 'N/A')
                   <br> <small class="text-justify"><i class="fa fa-object-group"></i>{{$listing->bathrooms}} bathrooms</small>
                    @endif <br>
                    @if ($listing->expire_after !== 'N/A')
                   <br> <small class="text-justify"><i class="fa fa-opencart"></i>Expire After {{$listing->expire_after}}</small>
                    @endif <br>
                    @if (!empty($listing->job_type))
                    <i class="fa fa-paw"></i> Job Type
                   <br> <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->job_type}}</small>
                    @endif
                    @if ($listing->career_level !== 'N/A')
                   <br> <small class="text-justify"><i class="fa fa-pied-piper"></i>Career Level: {{$listing->career_level}}</small>
                    @endif
                    @if ($listing->positions_available !== 'N/A')
                   <br> <small class="text-justify"><i class="fa fa-tasks"></i>{{$listing->positions_available}} Positions Available</small>
                    @endif
                    @if (!empty($listing->start_date))
                   <br> <small class="text-justify"><i class="fa fa-calendar"></i>From: {{ date('F d, Y', strtotime($listing->start_date))}}</small>
                    @endif
                    @if (!empty($listing->end_date))
                   <br> <small class="text-justify"><i class="fa fa-calendar"></i>To: {{ date('F d, Y', strtotime($listing->end_date))}}</small>
                    @endif
                    @if (!empty($listing->color))
                   <br> <small class="text-justify"><i class="fa fa-tint"></i>Color: {{$listing->color}}</small>
                    @endif
                    @if (!empty($listing->age))
                   <br> <small class="text-justify"><i class="fa fa-themeisle"></i>Age: {{$listing->age}}</small>
                    @endif
                    <hr>
                   <small class="text-justify"><i class="fa fa-calendar"></i>Listed On: {{ date('F d, Y', strtotime($listing->created_at)) }}</small><br>
                    
                   <i class="fa fa-tags"></i> Description <br>
                   <i class="fa fa-angle-double-right"></i><small class="text-justify one">
                      {{$listing->description}}
                    </small>
                </div>
                <div class="col-sm-4">
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
              @php
              use App\User;
              $listing_user= User::find($listing->user_id);
              @endphp
              {{Form::hidden('receiver_id', $listing->user_id)}}
              {{Form::hidden('receiver_email', $listing_user->email)}}
              {{Form::hidden('receiver_name', $listing_user->u_name)}}
              {{Form::submit('Send Message', ['class' => 'btn btn-primary btn-md', 'style' => 'text-transform:uppercase;'])}}
              <br><br>
              <button type="button" class="btn cancel btn-danger" onclick="closeForm()">Cancel</button>
              {!! Form::close() !!}
          </div>
                    <hr>
                    
                    <small class="text-justify"><i class="fa fa-user"></i><br>{{$listing_user->u_name}}</small>
                    @if ($listing->type == 'paid')
                    <br><small class="text-justify"><i class="fa fa-envelope"></i><br>{!!$listing_user->email!!}</small>
                   <br> <small class="text-justify"><i class="fa fa-phone-square"></i><br>{{$listing_user->phone}}</small>
                    @endif
                    @if ($listing->type == 'free')
                    <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                    {!! Form::open(['action' => 'UpdateuserController@show_free', 'method' => 'POST', 'id' => 'my_form']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('id', $listing->user_id)}}
                         {{Form::submit('SELLER PROFILE', ['class' => 'btn btn-success'])}}
                    {!! Form::close() !!}
                   </a>
                   @endif
                   @if ($listing->type == 'paid')
                    <a href="../profile/{{$listing->user_id}}/" class="btn btn-success btn-md">SELLER PROFILE</a>
                    @endif
                </div>
            </div>
            <hr>
            <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
    </div>
        <div class="col-sm-3">
            
            <h3 class="title">Categories</h3>
            <hr class="hrr">
            
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'CURRENCY TRADING')}}
                 {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'MINERAL, CRUDE OIL')}}
                 {{Form::submit('MINERAL/CRUDE OIL', ['class' => 'btn btn-default', 'style' => 'text-transform:uppercase;'])}}
                
               
                ({{App\Listings::where('category', 'MINERAL, CRUDE OIL')->where('status', 'approved')->count()}})
           
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
                 {{Form::hidden('category', 'JOBS')}}
                 {{Form::submit('JOBS', ['class' => 'btn btn-default'])}}
                
            {!! Form::close() !!}
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
                 {{Form::hidden('category', 'REAL ESTATE, LANDS')}}
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
        </div>
        
    </div>
@php
use App\Listings;
$u_listings = Listings::orderBy('updated_at', 'desc')->where('user_id',$listing->user_id)/**->where('id',$listing->id)**/->where('status','approved')->paginate(4);
@endphp
<div class="container">
  <h2 class="title text-center" style="color: #B20000;">More listings from {{$listing_user->u_name}}</h2>
  @if (count($u_listings) > 0)
@foreach (
// Loop through them
$u_listings as $u_listing
)

<a href="../listings/{{$u_listing->id}}" title="">
<div class="col-sm-3">
<div class="container folio">
<div class="panel-default">
    <div class="panel-body">
        <div class="bottom-left">
            <i class="fa fa-eye"></i><span>{{App\ListingView::where('listings_id', $u_listing->id)->count() }}</span>
        </div>
        <div class="bottom-right">
            {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
            {{Form::hidden('id', $u_listing->id)}} 
            {{Form::hidden('title', $u_listing->title)}}
            {{Form::hidden('image', $u_listing->image1)}}
            {{Form::hidden('type', $u_listing->type)}}
            @guest
            <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
            @else 
            @if(empty(App\Favorite::where('user_id', '=',  auth()->user()->id)->where('listing_id', '=',  $u_listing->id)->first()))
             
            <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
            @else
            <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
            @endif
            @endguest
            
             {{ Form::close() }}
        </div>
        @if (!empty($u_listing->image1))
        <img src="{{ URL::to('img/cover_images/listings/'.$u_listing->image1)}}" class="img-responsive" alt="">
        @else
        <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
            
        @endif
    </div>
    <div class="panel-footer">
        <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($u_listing->title,8)!!}</small>
        <hr>
        <p class="text-justify">
            @if (!empty($u_listing->country))
            <i class="fa fa-map-marker"></i>{{$u_listing->country}}
            @endif     
            @if (!empty($u_listing->price))
            | <span>$</span>{{$u_listing->price}}
            @endif
            
            
        </p>
        
    </div>
    <div class="overlay">
        <p>
            <a href="../listings/{{$u_listing->id}}" class="icon" title="">
            <i class="fa fa-plus-circle"></i>
            </a>
        </p>
        </div>
        @if ( $u_listing->type == 'paid')
        <div class="top-left">
            <span class="btn btn-primary">FEATURED</span>
        </div>
            
        @endif
</div>
</div>
</div>
</a>
@endforeach        
@else
<p class="text-center">No other listing from this user.</p>
@endif
</div>
</div>

@include('inc.footerinner')

<script>
    function myFunction(x) {
    x.classList.toggle("fa fa-bookmark");
}
var msg = '{{Session::get('alert')}}';
var exist = '{{Session::has('alert')}}';
if (exist) {
    alert(msg);
}
</script>

<script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }
    
    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
    </script>
    
@endsection
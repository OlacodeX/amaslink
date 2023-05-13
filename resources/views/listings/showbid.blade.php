@extends('layouts.main')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | {{$listing->title}}
@endsection

<style>
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
    .panel-default,
    .panel-body{
      border: rgba(134, 134, 134, 0.233) 1px solid;
      border-radius: 0;

    }
    .col-sm-9{
        padding-right: 200px;
        padding-left: 0;
        margin-top: 10px;
        padding-top: 20px;
        margin-bottom: 200px;
        padding-bottom: 100px;
    }
    .col-sm-9:hover{
        box-shadow:none;
    }
    .fa{
font-weight: bold;
color: #B20000;

}
input.btn.btn-primary
{
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
form p.re{
        font-size: 13px;
        color: #b20000;
        padding-top: 3px;
    }
    /* The popup chat - hidden by default */
    .chat-popup {
  display: none;
}


.btn.btn-success,
.btn.btn-info{
background: tomato;
border: none;
font-size: 11px;
letter-spacing: 3px;
padding: 5px 22px;
border-radius: 0;
margin-top: 18px;
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
    padding-bottom: 50px;
}
img.img-responsive{
    width: 200px;
    height: 200px;
}
.carousel-inner .item img{
    width: 1200px;
}
@media only screen and (max-width: 768px) {

    div.col-sm-9{
        padding: auto;
        margin: auto;
        box-shadow: 5px 0px 5px 0px rgba(0, 0, 0, 0.2);
    }

    div.container-fluid.listing{
        padding: auto;
        width: 100%;
    }
    .panel-heading{
      font-size: 10px;
    }
    }

</style>
@section('content')
@include('inc.navotherr')
<div class="row">
    <div class="container-fluid listing">
        <div class="col-sm-9">
          <?php
          //$years gives me in y,m,d format
          $dateOfBirth =\Carbon\Carbon::now();
          $years = \Carbon\Carbon::parse($dateOfBirth)->diff($listing->end_date)->format('%d days');
            ?>
           <div class="panel panel-default">
            <div class="panel-heading">
            Bid On Item: <i>{{$listing->title}}</i> <small class="pull-right"><i class="fa fa-calendar"></i>Bidding Closes in {!! $years !!}</small>
            </div>
            <div class="panel-body">
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
          <button class="btn btn-success"><i class="fa fa-mars"></i>{{$listing->category}}</button>
          <button class="btn btn-success">Min. Bid <i class="fa fa-dollar"></i>{{$listing->price}} USD</button>
          <button class="btn btn-success"><i class="fa fa-map-signs"></i>{{$listing->country}}</button>
            <br>
          <i class="fa fa-tags"></i> Description <br>
          <i class="fa fa-angle-double-right"></i><small class="text-justify one">
             {{$listing->description}}
           </small> <br>
           <i class="fa fa-map-signs"></i>Address(es) <br>
           <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->address1}}, {{$listing->country}},</small><br>
           @if (!empty($listing->address2))
           <i class="fa fa-angle-double-right"></i><small class="text-justify">{{$listing->address2}}</small>
           @endif <br>
            </div>
            
        </div>
              @if (count($bids) > 0)
              @foreach ($bids as $bid)
              <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-user"></i>{{$bid->bidder_name}}
              </div>
              <div class="panel-body">
                @guest
                {{$bid->bid}} USD
                @else 
                {{$bid->bid}} USD
               
              @if ($bid->bidder_id == auth()->user()->id)
                  
             <div class="pull-right"> 
            {!!Form::open(['action' => ['AuctionsController@destroy', $bid->id], 'method' => 'POST','style' => 'margin-right:20px;'])!!}

            {{Form::hidden('_method', 'DELETE')}}
            {{Form::hidden('bidder_id', $bid->bidder_id)}}
            {{Form::submit('Delete Bid', ['class' => 'btn btn-info btn-sm'])}}
            {!!Form::close()!!}
              <button type="button" class="btn btn-info btn-lg" onclick="myFunction(this)" data-toggle="modal" data-target="#myModal{{$bid->bidder_name}}">Edit Bid</button>

          <!-- Modal -->
                  
          <div id="myModal{{$bid->bidder_name}}" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  
                </div>
                <div class="modal-body">
                  {!! Form::open(['method' => 'POST', 'action' => 'AuctionsController@update_bid'])!!}
                  {{Form::number('bid', $bid->bid, [ 'class' => 'form-control', 'min' => $listing->price])}}
                  {{Form::hidden('id', $bid->id, [ 'class' => 'form-control'])}} 
                  {{Form::submit('Update Bid', ['class' => 'btn btn-success btn-md pull-left', 'style' => 'text-transform:uppercase;'])}}
                {!! Form::close() !!}
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
            </div>

            </div>
            @endif
            @endguest
          </div>
          </div>
                  
              @endforeach
              <div class="pagn" style="margin-top:30px; margin-left:0;padding-left:0;">
                    <!-----The pagination link----->
                    {{$bids->links()}}
              </div>

                  
              @else
                  <p>No bids yet</p>
              @endif
              @if ($listing->end_date == \Carbon\Carbon::now() || $listing->end_date < \Carbon\Carbon::now())

              <p>This item is not accepting bids any longer. Thanks.</p>
              @else
              <div class="panel panel-default">
               <div class="panel-heading">
                 <i class="fa fa-user"></i>Place Bid Now
                
               </div>
               <div class="panel-body">   
                 {!! Form::open(['method' => 'POST', 'action' => 'AuctionsController@store']) /** The action should be the block of code in the store function in PostsController
                 **/ !!}         
                  @include('inc.messages')
                  {{Form::label('bid amount', 'Bid Amount (USD)')}} <br>
               <p class="re">Minimum Bid For this Item is {{$listing->price}} USD</p>
                  {{Form::hidden('listing_id', $listing->id)}} 
                  {{Form::hidden('listing_user', $listing->user_id)}} 
                 <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
                 {{Form::number('bid', '', [ 'class' => 'form-control', 'min' => $listing->price])}} 
                 {{Form::submit('Place Bid', ['class' => 'btn btn-info btn-small pull-right', 'style' => 'text-transform:uppercase;', 'min' => $listing->price ])}}
                {!! Form::close() !!}
   
               </div>
              </div>
              @endif
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
@endsection
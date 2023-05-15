@extends('layouts.main')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads
@endsection
@include('inc.css.home')
@section('content')
    <div class="row main">
        @include('inc.nav')
        
    <div class="jumbotron text-center">
        <h1 class="text-center">AMASLINK.COM</h1>
        <h3 class="text-center">SELL ANYTHING…</h3>
       <div class="container">
        <p class="text-center">Home – Automobiles – Pets – Furnitures – Cloths – Brands – Services</p>
            {!! Form::open(['method' => 'GET', 'action' => 'PagesController@search_result']) !!}
            
            <div class="row">
            <div class="container-fluid form">
            <div class="col-sm-5">
                <div class="form-group">
                    {{Form::text('word', '', [ 'class' => 'form-control', 'placeholder' => 'Enter keyword', 'required'])}}
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    {{Form::text('country', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Country', 'required'])}}
                </div>
            </div>
            <div class="col-sm-2 text-center">
                
            {{Form::submit('search', ['class' => 'btn btn-success btn-md', 'style' => 'text-transform:uppercase;'])}}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>
</div>
<div class="row ads">
    {{-- <div id="myNav" class="overlay1">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">    
            <div class="container text-center cg">
            <h2 class="text-center title">AVAILABLE CATEGORIES</h2>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_1').submit();">
                    <div class="panel">
                        <img src="img/brand.png" alt="brand category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'brand')}}
                         {{Form::submit('BRANDS', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'BRANDS')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_2').submit();">
                    <div class="panel">
                        <img src="img/creativity.jpg" alt="creativity category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'CREATIVITY')}}
                         {{Form::submit('CREATIVITY', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'CREATIVITY')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
              </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_3').submit();">
                <div class="panel">
                    <img src="img/sport.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_3']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'SPORT')}}
                     {{Form::submit('SPORT', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'SPORT')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_4').submit();">
                <div class="panel">
                    <img src="img/currency.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'CURRENCY TRADING')}}
                     {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'LIKE', '%'.'CURRENCY TRADING'. '%')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                 </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_5').submit();">
                <div class="panel">
                    <img src="img/mineral.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_5']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'MINERAL, CRUDE OIL')}}
                     {{Form::submit('MINERAL/CRUDE OIL', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category','LIKE', '%'.'MINERAL, CRUDE OIL'. '%')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_6').submit();">
                <div class="panel">
                    <img src="img/kid.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_6']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'KIDS AND BABIES')}}
                     {{Form::submit('KIDS AND BABIES', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'KIDS AND BABIES')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_7').submit();">
                <div class="panel">
                    <img src="img/sale.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_7']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'BUSINESS SALES')}}
                     {{Form::submit('BUSINESS SALES', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'BUSINESS SALES')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_8').submit();">
                <div class="panel">
                    <img src="img/mobi.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_8']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'MOBILE,ELECTRONICS')}}
                     {{Form::submit('MOBILE/ELECTRONICS', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'MOBILE,ELECTRONICS')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_9').submit();">
                <div class="panel">
                    <img src="img/jobb.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_9']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'JOBS')}}
                     {{Form::submit('JOBS', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Jobs')->where('category', 'JOBS')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_9').submit();">
                <div class="panel">
                    <img src="img/job.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_9']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'SEEKING JOBS/CV')}}
                     {{Form::submit('SEEKING JOBS/CV', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Jobs')->where('category', 'SEEKING JOBS/CV')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_10').submit();">
                <div class="panel">
                    <img src="img/real.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_10']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'REAL ESTATE,LANDS')}}
                     {{Form::submit('REAL ESTATE/LANDS', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'REAL ESTATE,LANDS')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_11').submit();">
                <div class="panel">
                    <img src="img/auto.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_11']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'AUTOMOBILES')}}
                     {{Form::submit('AUTOMOBILES', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'AUTOMOBILES')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_12').submit();">
                    <div class="panel">
                        <img src="img/tone.svg" alt="brand category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_12']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'Precious Stone')}}
                         {{Form::submit('Precious Stone', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'Precious Stone')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_13').submit();">
                    <div class="panel">
                        <img src="img/movie.png" alt="creativity category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_13']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'Movies And Scripts')}}
                         {{Form::submit('Movies And Scripts', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'Movies And Scripts')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
              </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_14').submit();">
                <div class="panel">
                    <img src="img/schoo.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_14']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Education')}}
                     {{Form::submit('Education', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Education')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_15').submit();">
                    <div class="panel">
                        <img src="img/schoo.png" alt="brand category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_15']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'Thesis Help')}}
                         {{Form::submit('Thesis Help', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'Thesis Help')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_16').submit();">
                    <div class="panel">
                        <img src="img/trve.png" alt="creativity category" class="img-responsive">
                    </div>
                    {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_16']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                    <p>
                         {{Form::hidden('category', 'Travel')}}
                         {{Form::submit('Travel', ['class' => 'btn btn-success'])}}
                        
                        <br>
                        ({{App\Models\Listings::where('category', 'Travel')->where('status', 'approved')->count()}})
                    </p>
                    {!! Form::close() !!}
              </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_17').submit();">
                <div class="panel">
                    <img src="img/fhion.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_17']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Fashion')}}
                     {{Form::submit('Fashion', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Fashion')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_18').submit();">
                <div class="panel">
                    <img src="img/nim.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_18']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Animal')}}
                     {{Form::submit('Animal', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Animal')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_19').submit();">
                <div class="panel">
                    <img src="img/event.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_19']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Events')}}
                     {{Form::submit('Events', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Events')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_20').submit();">
                <div class="panel">
                    <img src="img/heth.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_20']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Health')}}
                     {{Form::submit('Health', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Health')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_21').submit();">
                <div class="panel">
                    <img src="img/home.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_21']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Home & Lifestyle')}}
                     {{Form::submit('Home & Lifestyle', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Home & Lifestyle')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_22').submit();">
                <div class="panel">
                    <img src="img/ife.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_22']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Matrimonials')}}
                     {{Form::submit('Matrimonials', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Matrimonials')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_23').submit();">
                <div class="panel">
                    <img src="img/auto.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_23']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Classic Cars')}}
                     {{Form::submit('Classic Cars', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Classic Cars')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_24').submit();">
                <div class="panel">
                    <img src="img/kid.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_24']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Baby Toys')}}
                     {{Form::submit('Baby Toys', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Baby Toys')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
    
            <div class="col-sm-2">
                <a href="javascript:{}" onclick="document.getElementById('my_form_25').submit();">
                <div class="panel">
                    <img src="img/service.png" alt="brand category" class="img-responsive">
                </div>
                {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_25']) /** The action should be the block of code in the store function in PostsController
                **/ !!}
                <p>
                     {{Form::hidden('category', 'Services')}}
                     {{Form::submit('Services', ['class' => 'btn btn-success'])}}
                    
                    <br>
                    ({{App\Models\Listings::where('category', 'Services')->where('status', 'approved')->count()}})
                </p>
                {!! Form::close() !!}
                </a>
            </div>
        </div>
        <div class="text-center col-sm-12">
            <a href="" id="loadMore" class="btn btn-success">SEE MORE CATEGORIES</a>
        </div>
        </div>
      </div>
      
      <h5 class="ct" id="cat"><span onclick="openNav()">&#9776; SEE CATEGORIES</span></h5> --}}
        
    <div class="container ads text-justify">
        
      {{-- {{ dd($boosted_paid) }} --}}

    <h2 class="title text-center">LATEST LISTINGS</h2>
    <h6 class="text-center"> BUY & SELL ANYTHING</h6>
    @if (count($boosted_free) > 0)
        @if (count($boosted_paid) > 0)
            @foreach (
                    // Loop through them
                    $boosted_paid as $boosted_paid
                    )
                <a href="listings/{{$boosted_paid->id}}" title="">
                <div class="col-sm-3">
                    <div class="container folio">
                    <div class="panel-default">
                        <div class="panel-body">
                            <div class="bottom-left">
                                <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $boosted_paid->id)->count() }}</span>
                            </div>
                            <div class="bottom-right">
                                {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                                {{Form::hidden('id', $boosted_paid->id)}}
                                {{Form::hidden('title', $boosted_paid->title)}}
                                {{Form::hidden('image', $boosted_paid->image1)}}
                                {{Form::hidden('type', $boosted_paid->type)}}
                                @guest
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                                @else 
                                @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $boosted_paid->id)->first()))
                                
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                                @else 
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                                @endif
                                @endguest
                                {{ Form::close() }}
                            </div>
                            @if ($boosted_paid->image1 !== 'null')
                            <img src="{{ URL::to('img/cover_images/listings/'.$boosted_paid->image1)}}" class="img-responsive" alt="">
                            @else
                            <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                                
                                
                            @endif
                        </div>
                        <div class="panel-footer">
                            <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($boosted_paid->title,6)!!}</small>
                            <hr>
                            <p class="text-justify">
                                @if (!empty($boosted_paid->country))
                                <i class="fa fa-map-marker"></i>{{$boosted_paid->country}}
                                @endif     
                                @if (!empty($boosted_paid->price))
                                | <span>$</span>{{$boosted_paid->price}}
                                @endif        
                            </p>
                            
                        </div>
                        <div class="top-left">
                            <span class="btn btn-primary">FEATURED</span>
                        </div>
                    </div>
                    </div>
                </div>
                </a>
            @endforeach
        @endif         
        @if (count($boosted_free) > 0)
            @foreach (
                    // Loop through them
                    $boosted_free as $boosted_free
                    )
                <a href="listings/{{$boosted_free->id}}" title="">
                <div class="col-sm-3">
                    <div class="container folio">
                    <div class="panel-default">
                        <div class="panel-body">
                            <div class="bottom-left">
                                <i class="fa fa-eye"></i><span>{{App\Models\ListingView::where('listings_id', $boosted_free->id)->count() }}</span>
                            </div>
                            <div class="bottom-right">
                                {{ Form::open(array('action' => 'ListingsController@bookmark')) }}  
                                {{Form::hidden('id', $boosted_free->id)}}
                                {{Form::hidden('title', $boosted_free->title)}}
                                {{Form::hidden('image', $boosted_free->image1)}}
                                {{Form::hidden('type', $boosted_free->type)}}

                                @guest
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                                @else 
                                @if(empty(App\Models\Favorite::where('user_id', '=', auth()->user()->id)->where('listing_id', '=',  $boosted_free->id)->first()))
                                
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart-o" title="Bookmark"></button>
                                @else 
                                <button type="submit" onclick="myFunction(this)" class="fa fa-heart" title="Remove Bookmark"></button>
                                
                                @endif
                                @endguest
                                {{ Form::close() }}
                            </div>
                            @if (!empty($boosted_free->image1))
                            <img src="{{ URL::to('img/cover_images/listings/'.$boosted_free->image1)}}" class="img-responsive" alt="">
                            @else
                            <img src="{{ URL::to('img/AMAS.png')}}" class="img-responsive" alt="">
                                
                            @endif
                        </div>
                        <div class="panel-footer">
                            <small class="text-justify"><i class="fa fa-cubes"></i>{!!Str::words($boosted_free->title,6)!!}</small>
                            <hr>
                            <p class="text-justify">
                                @if (!empty($boosted_free->country))
                                <i class="fa fa-map-marker"></i>{{$boosted_free->country}}
                                @endif     
                                @if (!empty($boosted_free->price))
                                | <span>$</span>{{$boosted_free->price}}
                                @endif
                            </p>
                            
                        </div>
                    </div>
                    </div>
                </div>
                </a>
            @endforeach
        @endif                   
        </div>
    
        <div class="text-center">
            <a href="/alllistings" class="btn btn-success">SEE MORE LISTINGS</a>   
    @else
            <p class="text-center">No Items Yet</p>
    @endif
        </div>
</div>

</div>
<div class="row">
    @include('inc.footer')
</div>
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
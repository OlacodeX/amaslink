@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Categories
@endsection
@include('inc.css.category')
@section('content')
@include('inc.navother')
<div class="row bl">
    <div class="container text-center">
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
                     {{Form::submit('BRANDS', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                     {{Form::submit('CREATIVITY', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                 {{Form::submit('SPORT', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'CURRENCY TRADING')->where('status', 'approved')->count()}})
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
                 {{Form::submit('MINERAL/CRUDE OIL', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'MINERAL, CRUDE OIL')->where('status', 'approved')->count()}})
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
                 {{Form::submit('KIDS AND BABIES', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('BUSINESS SALES', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('MOBILE/ELECTRONICS', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'MOBILE,ELECTRONICS')->where('status', 'approved')->count()}})
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
                 {{Form::submit('SEEKING JOBS/CV', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'Jobs')->where('category', 'SEEKING JOBS/CV')->where('status', 'approved')->count()}})
            </p>
            {!! Form::close() !!}
            </a>
        </div>
        <div class="col-sm-2">
            <a href="javascript:{}" onclick="document.getElementById('my_form_26').submit();">
            <div class="panel">
                <img src="img/jobb.png" alt="brand category" class="img-responsive">
            </div>
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_26']) /** The action should be the block of code in the store function in PostsController
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
            <a href="javascript:{}" onclick="document.getElementById('my_form_10').submit();">
            <div class="panel">
                <img src="img/real.png" alt="brand category" class="img-responsive">
            </div>
            {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_10']) /** The action should be the block of code in the store function in PostsController
            **/ !!}
            <p>
                 {{Form::hidden('category', 'REAL ESTATE, LANDS')}}
                 {{Form::submit('REAL ESTATE/LANDS', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'REAL ESTATE, LANDS')->where('status', 'approved')->count()}})
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
                 {{Form::submit('AUTOMOBILES', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                     {{Form::submit('Precious Stone', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                     {{Form::submit('Movies And Scripts', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                 {{Form::submit('Education', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                     {{Form::submit('Thesis Help', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                     {{Form::submit('Travel', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                    
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
                 {{Form::submit('Fashion', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Animal', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Events', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Health', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Home & Lifestyle', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Matrimonials', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Classic Cars', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Baby Toys', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
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
                 {{Form::submit('Services', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                
                <br>
                ({{App\Models\Listings::where('category', 'Services')->where('status', 'approved')->count()}})
            </p>
            {!! Form::close() !!}
            </a>
        </div>

    </div>
</div>
@include('inc.footer')
@endsection
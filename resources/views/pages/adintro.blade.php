@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Post Ad
@endsection
@include('inc.css.adintro')
@section('content')
    @include('inc.nav')
    <div class="container-fluid packages">
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success in">Free Ad</h4>
                    <p>Amaslink Free Ad</p>
                    <small>
                        Reach out to your target audience faster. On amaslink, we offer you a platform with an audience from over
                        195 countries.
                    </small>
                    <div class="text-center">
                        <a href="./ad_packs_free" class="btn btn-info">Post Free Ad Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success in">Inventory & <br> Creativity</h4>
                    <p>Inventory & Creativity</p>
                    <small>
                        Want the world to be aware of you? Post your creativity Ads for faster and more audience.
                    </small>
                    {!! Form::open(['action' => 'PagesController@ad_packs', 'method' => 'POST', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('amount1', '1.00')}}
                         {{Form::hidden('amount2', '3.00')}}
                    {!! Form::close() !!}
                    <div class="text-center one">
                    <a href="javascript:{}" onclick="document.getElementById('my_form_1').submit();" class="btn btn-info">Post Ad</a>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success sp">FOR SPORTS</h4>
                    <p>Sport Gig</p>
                    <small>
                       Do you have a sport gig? Here is the opportunity for you to sell faster.
                    </small>
                    {!! Form::open(['action' => 'PagesController@ad_packs', 'method' => 'POST', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('amount1', '1.00')}}
                         {{Form::hidden('amount2', '3.00')}}
                    {!! Form::close() !!}
                    <div class="text-center one">
                    <a href="javascript:{}" onclick="document.getElementById('my_form_1').submit();" class="btn btn-info">Post Ad</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success">BUSINESS <br> SALES</h4>
                    <p>Business Sale</p>
                    <small class="three">
                       Do you have an established firm or business for sale? Here's the opportunity for you to sell faster.
                    </small>
                    {!! Form::open(['action' => 'PagesController@ad_packs', 'method' => 'POST', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('amount1', '5.00')}}
                         {{Form::hidden('amount2', '8.00')}}
                    {!! Form::close() !!}
                    <div class="text-center one">
                    <a href="javascript:{}" onclick="document.getElementById('my_form_2').submit();" class="btn btn-info">Post Ad</a>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success br">BRANDS PACKS</h4>
                    <p>Brands Pack</p>
                    <small>
                       Do you have a brand? Here is the opportunity for you to showcase it and sell faster.
                    </small>
                    {!! Form::open(['action' => 'PagesController@ad_packs', 'method' => 'POST', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('amount1', '5.00')}}
                         {{Form::hidden('amount2', '8.00')}}
                    {!! Form::close() !!}
                    <div class="text-center one">
                    <a href="javascript:{}" onclick="document.getElementById('my_form_2').submit();" class="btn btn-info">Post Ad</a>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="btn btn-success br">AUCTION SALES</h4>
                    <p>Auction Sales</p>
                    <small>
                       Do you have an item for auction? Place it on sale on Amaslink and get the best bids.
                    </small>
                    {!! Form::open(['action' => 'PagesController@auction', 'method' => 'POST', 'id' => 'my_form_13']) /** The action should be the block of code in the store function in PostsController
                    **/ !!}
                         {{Form::hidden('amount1', '3.00')}}
                         {{Form::hidden('amount2', '5.00')}}
                    {!! Form::close() !!}
                    <div class="text-center one">
                    <a href="javascript:{}" onclick="document.getElementById('my_form_13').submit();" class="btn btn-info">Post Ad</a>
                    
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        @include('inc.footer')
    </div>
@endsection
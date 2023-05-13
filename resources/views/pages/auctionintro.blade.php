@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}}- Best Free Classified Ads | Auction Item
@endsection
@include('inc.css.auctionintro')
@section('content')
@include('inc.nav')
<div class="container top text-center">
    @include('inc.messages')
    
    <h3 class="title"><span>AMASLINK</span> CLASSIFIED ADS</h3>
   <small>
        
        Reach out to your target audience faster. On amaslink, we offer you a platform with an audience from over
        195 countries.
    </small>
</div>
<div class="container pricing">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div class="panel-default text-center one">
                    <img src="img/service.png" alt="">
                    <div class="panel-body">
                        <h4>Things to know</h4>
                        <li>Users who wish to have more features (like more Ad pictures/images) should use any of the other packages.</li>
                        <li>Users who wish to give their Ads top priority (i.e to appear on top of recent Ads)  can do this anytime by using the boost Ads button on their dashboard. This comes with an additional cost of $3.</li>
                    </div>
            </div>

        </div>

        <div class="col-sm-4 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="">Normal Package</h4>
      
                    <h2><span>$</span>3,00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-close"></i>Unlimited ADS</li>
                            <li><i class="fa fa-check"></i>Google Map</li>
                            <li><i class="fa fa-check"></i>Unlimited Categories</li>
                            <li><i class="fa fa-close"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 60 Countries</li>
                            <li><i class="fa fa-check"></i>Max. Of 2 AD Image</li>
                            <li><i class="fa fa-close"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'ListingsController@chargeauction', 'method' => 'POST']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', '3')}}
                         {{Form::hidden('package', 'Free')}}
                         {{Form::submit('Subscribe Package', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="">Boosted Package</h4>
      
                    <h2><span>$</span>5,00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-check"></i>Unlimited ADS</li>
                            <li><i class="fa fa-check"></i>Google Map</li>
                            <li><i class="fa fa-check"></i>Unlimited Categories</li>
                            <li><i class="fa fa-check"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 195 Countries</li>
                            <li><i class="fa fa-check"></i>Max. Of 5 AD Images</li>
                            <li><i class="fa fa-check"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'ListingsController@chargeauction', 'method' => 'POST']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', '5')}}
                         {{Form::submit('Subscribe To Boosted Package', ['class' => 'btn btn-success', 'name' => 'submit','style' => 'text-transform:uppercase;'])}}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
</div>
</div>

@include('inc.footer')
@endsection
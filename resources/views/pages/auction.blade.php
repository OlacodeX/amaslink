@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}}- Best Free Classified Ads | Ad Packs
@endsection
@include('inc.css.auction')
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
                        <li>Users who wish to give their Ads top priority (i.e to appear on top of recent Ads)  can do this anytime by using the boost Ads button on their dashboard. This comes with an additional cost of $3.</li>
                    </div>
            </div>

        </div>
        @php
            $amount1 = $_POST['amount1'];
            $amount2 = $_POST['amount2'];
        @endphp
        <div class="col-sm-4 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="">Normal Package</h4>
      
                    <h2><span>$</span>{{$amount1}},00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-check"></i>Up To 195 Countries</li>
                            <li><i class="fa fa-close"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 5 AD Images</li>
                            <li><i class="fa fa-check"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'PaymentController@auction', 'method' => 'POST']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', $amount1)}}
                         {{Form::submit('Subscribe To Package', ['class' => 'btn btn-success', 'name' => 'submit','style' => 'text-transform:uppercase;'])}}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="">Boosted Package</h4>
      
                    <h2><span>$</span>{{$amount2}},00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-check"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 195 Countries</li>
                            <li><i class="fa fa-check"></i>Up To 5 AD Images</li>
                            <li><i class="fa fa-check"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'PaymentController@auction', 'method' => 'POST']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', $amount2)}}
                         {{Form::submit('Subscribe To Package', ['class' => 'btn btn-success', 'name' => 'submit','style' => 'text-transform:uppercase;'])}}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
</div>
</div>

@include('inc.footer')
@endsection
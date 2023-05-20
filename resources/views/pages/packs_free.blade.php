@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}}- Best Free Classified Ads | Ad Packs
@endsection
@section('content')
<style>
    .container-fluid.why .container.pricing{
            padding-top: 50px;
            padding-bottom: 100px;
        }
        h4{
            color:#171919d3;
            font-weight: bold;
            font-size: 15px;
            padding-bottom: 0;
        }
        h4:hover{
            color:#b20000;
            font-weight: bold;
            font-size: 15px;
            padding-bottom: 0;
        }
        .container.pricing li{
            list-style: none;
            padding-bottom: 18px;
            color: #b20000;
            padding-left: 0;
            padding-right: 30px;
            font-size: 11px;
        }
        .container.pricing .panel-default{
        box-shadow: 0 10px 12px 0 rgba(0, 0, 0, 0.2);

        }
        .container.pricing .panel-default.one{
        box-shadow: none;

        }
        .container.pricing .panel-default:hover{
        box-shadow:none;

        }
        .container.pricing .col-sm-4 .panel-default .panel-body h2{
            color:#171919d3;
            font-size: 15px;
            padding-top: 3px;
            padding-bottom: 9px;
            font-weight: bold;
        }
        .container.pricing .col-sm-4 .panel-default .panel-body h2 span{
            color:#171919d3;
            font-size: 10px;
            font-weight: normal;
        }
        hr.hrr {
         height: 2px;
         color: #b20000;
        background-color:#b20000;
        border: none;
       }
        .text-center p.pad{
            padding-left: 120px;
            padding-right: 120px;
            padding-top: 5px;
            font-size: 10px;
        }
        .text-center p{
            padding-top: 5px;
            font-size: 10px;
        }
    
    .container.pricing{
        margin-top: 50px;
        width: 90%;
        padding-bottom: 70px;
    }
    div.text-center{
        padding-bottom: 10px;
    }
    .fa.fa-close{
        color: #ff0101;
    }
    .fa.fa-check{
        color: #09ff01;
    }
input.btn.btn-success {
background: #b20000;
border: none;
font-size: 13px;
border-radius: 0;
padding: 5px 30px;
}
input.btn.btn-success:hover {
background: transparent;
border: 1px solid #b20000;
font-size: 11px;
border-radius: 0;
color: #B20000;
}
.container.top{
    background: #dff2fe;
    margin-top: 80px;
    padding-top: 10px;
    border-radius: 3px;
}
.container.top h3{
    padding-bottom: 10px;
    margin-bottom: 0;
}
.fa.fa-info-circle{
    color: #0178ff;
}
@media only screen and (max-width: 768px) {
input.fie[type="file"]::-webkit-file-upload-button{
   -webkit-appearance: none;
   margin: 0 0 20px 50px;
   border: 1px solid #b20000;
   border-radius: 4px;
   padding: 10px 10px;
   background: transparent;
   color: #B20000;
   font-weight: bold;
}
   
p.top{
    color: #b20000;
    font-size: 12px;
}
}
</style>
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
      
                    <h2><span>$</span>0,00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-close"></i>Unlimited ADS</li>
                            <li><i class="fa fa-check"></i>Google Map</li>
                            <li><i class="fa fa-check"></i>Unlimited Categories</li>
                            <li><i class="fa fa-close"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 60 Countries</li>
                            <li><i class="fa fa-check"></i>Max. Of 1 AD Image</li>
                            <li><i class="fa fa-close"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'ListingsController@create', 'method' => 'GET']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', '0')}}
                         {{Form::hidden('package', 'Free')}}
                         {{Form::submit('Subscribe To Free Package', ['class' => 'btn btn-success', 'style' => 'text-transform:uppercase;'])}}
                        {!! Form::close() !!}
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 text-center">
            <div class="panel-default text-center">
                <div class="panel-body">
                    <h4 class="">Boosted Package</h4>
      
                    <h2><span>$</span>3,00</h2>
                        <ul>
                            <li><i class="fa fa-check"></i>Never Expire</li>
                            <li><i class="fa fa-check"></i>Unlimited ADS</li>
                            <li><i class="fa fa-check"></i>Google Map</li>
                            <li><i class="fa fa-check"></i>Unlimited Categories</li>
                            <li><i class="fa fa-check"></i>Priority Listing</li>
                            <li><i class="fa fa-check"></i>Up To 195 Countries</li>
                            <li><i class="fa fa-check"></i>Max. Of 2 AD Images</li>
                            <li><i class="fa fa-check"></i>AD Video</li>
                        </ul>
                    <hr class="hrr">
                    <p class="text-center">
                        {!! Form::open(['action' => 'PaymentController@charge_free', 'method' => 'POST']) /** The action should be the block of code in the store function in PostsController
                        **/ !!}
                         {{Form::hidden('amount', '3')}}
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
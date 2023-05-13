@extends('layouts.main')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads
@endsection
<style>

    
div.col-sm-4{
    display:none;
}
#loadMoree2 {
    transition: all 600ms ease-in-out;
    -webkit-transition: all 600ms ease-in-out;
    -moz-transition: all 600ms ease-in-out;
    -o-transition: all 600ms ease-in-out;
    text-transform: uppercase;
}

    
    .row.ads{
                background: #bababb5e;
                margin-top: 0px;
                padding-top: 50px;
                padding-bottom: 100px;
            }
    .row.ads .container{
                width: 78%;
            }
            .row.ads h6{
                color: #B2000093;
            }
            .row.ads a{
                text-decoration: none;
                color: #B2000093;
            }
            
            .row.ads .fa{
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
        .row.ads .panel-default .panel-footer{
            height: 60px;
        }
        .row.ads .panel-default .panel-footer p{
            color:#171919d3;
            font-size: 12px;
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
        .row.ads .panel-default .panel-footer hr{
            padding-top: 0;
            margin-top: 0;
            margin-bottom: 0;
        }
            div.row.ads div.panel-default{
                width: auto;
                margin-bottom: 20px;
                box-shadow: 10px 6px 6px 0 rgba(0, 0, 0, 0.2);
            }
            div.row.ads div.panel-default div.panel-body{
                margin-bottom: 0;
                height: 200px;
                width: 200px;
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
  height: 71%;
  width: 200px;
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
                width: 200px;
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
 /* Bottom left text */
 .bottom-left {
            position: absolute;
            bottom: 80px;
            left: 15px;
            background: #f1f1f1;
            color: #b20000;
            padding-left: 15px;
            padding-right: 15px;
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
    @media only screen and (max-width: 768px) {
    h2.title{
        color: #171919;
        font-weight: bold;
        padding-top: 20px;
        padding-bottom: 20px;
        font-size: 20px;
    }

    .row.ads div.col-sm-3{
        float: left;
        width: 50%;
            }
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
            font-size: 8px;
            font-weight: normal;
        }
        .row.ads .panel-default .panel-footer small{
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
  height: 71%;
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

    }

      
</style>
@section('content')
    <div class="row main">
        @include('inc.nav')
    </div>
<div class="row ads">
    <div class="container text-justify">
        <h2 class="title text-center">LATEST LISTINGS</h2>
        <h6 class="text-center"> BUY & SELL ANYTHING</h6>
        @if (
            //if there is data in the db
        count($results) > 0
        )
            @foreach (
                // Loop through them
                $results as $result
                )
        <a href="./listinginner" title="">
        <div class="col-sm-4">
            <div class="container folio">
            <div class="panel-default">
                <div class="panel-body">
                    <div class="bottom-left">
                        <i class="fa fa-eye"></i><span>5</span>
                    </div>
                    <img src="{{ URL::to('img/cover_images/'.$result->cover_image)}}" class="img-responsive" alt="">
                </div>
                <div class="panel-footer">
                    <small class="text-justify"><i class="fa fa-cubes"></i>Genuine SBLC/BG Avai</small>
                    <hr>
                    <p class="text-justify"><i class="fa fa-map-marker"></i>USA | <span>$</span>0</p>
                    
                </div>
                <div class="overlay">
                    <p>
                        <a href="./listinginner" class="icon" title="">
                        <i class="fa fa-plus-circle"></i>
                        </a>
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
    
            @else
            <p>Your search matches none of our records, please try with another combination. Thanks.</p>
                
            @endif                    
    </div>
    
    <div class="text-center">
        <a href="" id="loadMoree2" class="btn btn-success">load MORE LISTINGS</a>
    </div>
</div>
<div class="row">
    @include('inc.footer')
</div>

@endsection
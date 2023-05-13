@extends('layouts.main')
<style>
input.form-control{
  border: none;
    background: #f9f9f9;
    border-radius: 0;

}
div.container-fluid.create{
    margin-top:50px; 
    padding-bottom:10px;
    border: 1px solid #f9f9f9;
    background: #f9f9f9;
    padding-top: 10px;
    margin-bottom: 50px;
}
div.col-sm-12 img.img-responsive{
  border-radius: 50%;
  height: 100px;
  width: 100px;
  margin-left: 230px;
  margin-bottom: 50px;
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
div.container-fluid.create .row{
    margin-top:0px; 
    padding-bottom:100px;
    border:none;
    background: white;
    padding-top: 0px;
    margin-left: 0px;
}
h3.title span {
color: #b20000;
font-weight: bold;
}
h3.title{
font-weight: bold;
color: #171919;
padding-bottom: 30px;
}
.btn.btn-primary{
    border:none;
    color: #f1f1f1;
    background: #b20000;
}
.btn.btn-primary:hover{
    border:1px solid #b20000;
    background: transparent;
    color: #b20000;
}
.btn.btn-success {
background: #b20000;
border: none;

color: #f1f1f1;
font-size: 11px;
border-radius: 0;
}
.btn.btn-success:hover {
background: transparent;
border: 1px solid #b20000;
font-size: 11px;
border-radius: 0;
color: #B20000;
}
       .card .btn.btn-info{
            border-radius: 100%;
            color:  #f1f1f1;
             padding: 7px;
            background:#b20000;
            border: none;
        }
        .card img{
            width: 200px;
            padding-left: 5px;
            padding-top: 5px;
        }
        .card{
            
            box-shadow: 0 5px 6px 0 rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
            padding-bottom: 30px;
            color: #b20000;
        }
        .card-body{
            background: #ffffff;
            padding-bottom: 20px;
            padding-left: 10px;
            width: 255px;
            color: #b20000;
        }
        .card-title{
            padding-top: 10px;
            line-height: 1.5em;
            font-weight: bold;
            font-size: 20px;
            color: #b20000;
            font-family: 'Supermercado One', cursive;
        }
        .card-body a{
        text-decoration: none;
        color: #b20000;
    }
        .card-body a:hover{
        text-decoration: none;
        color: #b20000;
    }
        .col-sm-6 li{
            list-style: none;
            padding-right: 0;
            margin-right: 0;
            padding: 5px;

        }
        .col-sm-6{
            list-style: none;
            padding-right: 0;
            margin-right: 0;

        }
        .col-sm-3 h5{
            font-weight: bold;
        }
            .col-sm-9{
                background: #ffffff;
            }
            .col-sm-9 h3,
            .col-sm-9 h5{
                font-family: 'Supermercado One', cursive;
            }
            .col-sm-9 h3,
            .col-sm-9 p{
            }
        .col-sm-6 span{
        }
        .col-sm-12{
            padding-bottom: 20px;
        }
        hr {
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 0.5px;
        }
        i.fa.fa-angle-double-left.first{
            color: #b20000;
            font-weight: bold;
        }
        i.fa.fa-angle-double-left{
            color: #b20000;
        }
@media only screen and (max-width: 768px) {   
div.col-sm-12 img.img-responsive{
  border-radius: 50%;
  height: 100px;
  width: 100px;
  margin-left: 20px;
  margin-bottom: 50px;
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2);
}
    
    div.container-fluid.create{
        margin-top:50px; 
        padding-bottom:10px;
        border: 1px solid #f9f9f9;
        background: #f9f9f9;
        padding-top: 10px;
        margin-bottom: 50px;
    }
    div.container-fluid.create .row{
        margin-top:20px; 
        padding-bottom:100px;
        width:100%;
        border:none;
        background: white;
        padding-top: 30px;
        margin-left: 0px;
    }
       
}
</style>
@section('content')
@include('inc.navotherr')
<div class="container-fluid create">
    @include('inc.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="title">Seller<span>'s Profile</span></h3></div>

                <div class="card-body">

                    <div class="container">
                        <div class="col-sm-3">
                                <div class="card">
                                        <img src="img/cover_images/{{$user->pp}}" class="card-img-top" alt="">
                                        <div class="card-body">
                                          <h5 class="card-title">{{$user->name}} {{ $user->l_name}}</h5>
                                         
                                        <a class="btn btn-info" href="https://www.facebook.com/{{$user->fb}}"> <i class="fa fa-facebook"></i></a> 
                                        <a class="btn btn-info" href="https://twitter.com/{{$user->twitter}}"><i class="fa fa-twitter"></i></a> 
                                        <a class="btn btn-info" href=""><i class="fa fa-instagram"></i></a> 
                                        <a class="btn btn-info" href="https://api.whatsapp.com/send?phone={{$user->phone}}"><i class="fa fa-whatsapp"></i></a> 
                                       
                                    </div>
                                </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="col-sm-12">
                            <div class="col-sm-3">
                                <h5><i class="fa fa-map-o"></i>Country</h5>
                            </div>
                            <div class="col-sm-6">
                                <li> <i class="fa fa-angle-double-left first"></i><span>{{$user->country}}</span> </li>
                                
                            </div>
                        </div>
                    <hr>
                        <div class="col-sm-12">
                        <div class="col-sm-3">
                            <h5><i class="fa fa-toggle-on"></i>Active Listings</h5>
                        </div>
                        @if ( $user->id == Auth::user()->id)
                        <div class="col-sm-6">
                            <li><i class="fa fa-angle-double-left first"></i><span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->count()}}  </span></li>
                           </div>
                           @else
                           <div class="col-sm-6">
                               <li><i class="fa fa-angle-double-left first"></i><span> {{App\Models\Listings::where('user_id', $user->id)->where('status', 'approved')->count()}}  </span></li>
                              </div>
                        @endif
                       </div>
                       <hr>
                       <div class="col-sm-12">
                            <div class="col-sm-3">  
                          
                                <h5><i class="fa fa-user"></i>Member since</h5>
                            </div>
                            <div class="col-sm-6">
                                <li><i class="fa fa-angle-double-left first"></i><span>{{date('F d, Y', strtotime($user->created_at))}}</span></li>
                              
                            </div>
                        </div>
                        <hr>
                            <div class="col-sm-12">
                                    <div class="col-sm-3">
                                        <h5><i class="fa fa-unlink"></i>Website</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <li><i class="fa fa-angle-double-left first"></i><span><a href="{{$user->web}}">{{$user->web}}</a></span></li>
                                        
                                    </div>
                                </div>
        </div>
    </div>
    @if ( $user->id == Auth::user()->id)
        
    <div class="col-sm-12">
      <a href="profile/{{$user->id}}/edit" class="btn btn-success">Edit Profile</a>
    </div>
    
    @endif
    <a href="{{ URL::previous() }}" class="btn btn-success">Go Back</a>
</div>


<style type="text/css">
    a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
    a.gflag img {border:0;}
    a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
    #goog-gt-tt {display:none !important;}
    .goog-te-banner-frame {display:none !important;}
    .goog-te-menu-value:hover {text-decoration:none !important;}
    body {top:0 !important;}
    #google_translate_element2 {display:none!important;}
    </style>
    
    <br /><div id="google_translate_element2"></div>
    <script type="text/javascript">
    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
    
    
    <script type="text/javascript">
    /* <![CDATA[ */
    eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
    /* ]]> */
    </script>
@endsection

@extends('layouts.main')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
      .col-md-12 .card{
        background: #f1f9f9;
          margin-top: 0;
          padding-top: 0;
      }
      .col-md-12{
        background: #f1f1f1;
          margin-top: 0;
          padding-top: 0;
      }
      div.container.main{
          background: #f9f9f9;
          margin-top: 0;
          margin-bottom: 20px;
      }
      p.pull-right {
          float: left;
          text-align: center;
          font-size: 12px;
          color: #b20000;

      }
      p.pull-right span{
          font-size: 30px;
          color: #171919;
          font-family:'poppins';
          font-weight: bold;
      }
      p.pull-left.t{
          background: #0083c9;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.a{
          background: #73cf42;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.e{
          background: #f04d4e;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.p{
          background: #ff9700;
          padding: 15px 15px;
          border-radius: 30px;
          color: #f1f1f1;

      }
      .col-sm-3{
          background: #ffffff;
          padding: 15px 15px;

      }
      .card-header h5{
          padding-top: 15px;
          padding-bottom: 15px;
          padding-left: 20px;
          color: #b20000;

      }
      td img{
          width: 50px;
          height: 50px;
      }
.page-item.active .page-link {
z-index: 1;
color: #fff;
background-color: #b20000;
border-color: #b20000;
}
.page-item .page-link {
color: #b20000;
}
  
#main {
  transition: margin-left .5s;
  padding: 16px;
  margin-left:250px;
}
@media only screen and (max-width: 768px) {
      .col-sm-3{
          background: #ffffff;
          padding: 15px 15px;
            margin-top: 100px;
      }
      .card-header h5{
          padding-top: 15px;
          padding-bottom: 15px;
          padding-left: 20px;
          color: #b20000;

      }
      .card-body{
          margin-top: 50px;

      }
      p.pull-left{
          float: none;
          margin-left: 30px;
      }
      p.pull-right {
          float: none;
          text-align: center;
          font-size: 12px;
          color: #b20000;

      }
      .col-md-12 .card{
        background: transparent;
          margin-top: 0;
          padding-top: 0;
      }
      .col-md-12{
        background: transparent;
          margin-top: 0;
          padding-top: 0;
      }
      div.container.main{
          background: transparent;
          margin-top: 0;
      }
      #main {
        transition: margin-left .5s;
        padding: 16px;
        margin-left:20px;
    }
      p.pull-right span{
          font-size: 30px;
          color: #171919;
          font-family:'poppins';
          font-weight: bold;
      }
      p.pull-left.t i.fa.fa-list,
      p.pull-left.a i.fa.fa-check,
      p.pull-left.e i.fa.fa-exclamation-triangle,
      p.pull-left.p i.fa.fa-clock-o{
          font-size: 20px;
          font-weight: normal;
          background: transparent;
          padding: 13px 13px;
          color: #f1f1f1;
      }
      p.pull-left.t{
          background: #0083c9;
          padding: 0px 0px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.a{
          background: #73cf42;
          padding: 0px 0px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.e{
          background: #f04d4e;
          padding: 0px 0px;
          border-radius: 30px;
          color: #f1f1f1;
      }
      p.pull-left.p{
          background: #ff9700;
          padding: 0px 0px;
          border-radius: 30px;
          color: #f1f1f1;

      }
}

</style>
@section('content')
@include('inc.navd')
  <!-- Page Content -->
  <div class="" id="main">
  
  <div class="w3-container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-justify">
                    <h5>You are logged in as <strong>{{ Auth::user()->u_name }}</strong> </h5>
                </div>
                @include('inc.messages')
                <div class="card-body">
                    <div class="col-sm-3">
                        <p class="pull-left t"><i class="fa fa-list"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->count() }} </span> <br>
                            Total Listings
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left a"><i class="fa fa-check"></i></p>
                        <p class="pull-right">
                            
                           <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'approved')->count()}}  </span><br>
                            Active Listings
                        </p>

                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left e"><i class="fa fa-exclamation-triangle"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'sold/expired')->count()}}  </span><br>
                            Sold/Expired Listings
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <p class="pull-left p"><i class="fa fa-clock-o"></i></p>
                        <p class="pull-right">
                            
                            <span> {{App\Models\Listings::where('user_id', auth()->user()->id)->where('status', 'pending')->count()}}  </span><br>
                            Pending Approval
                        </p>
                </div>
            </div>
        </div>

</div>
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

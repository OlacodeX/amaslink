@extends('layouts.maind')
<style>
    
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
}
</style>
@section('content')
@include('inc.navadmin')
<div class="" id="main" style="margin-left:250px">
<div class="container dashbd">
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="panel-default">

                <div class="panel-body">
                    <h3 class="text-justify title">Transactions <span>List</span></h3>
                    @if (count($payments) >= 0)
                    <table class="table table-stripped table-condensed table-responsive">
                        <tr>
                            <th>Payment ID</th>
                            <th>Payer</th>
                            <th>Payment date</th>
                        </tr>
                        @foreach ($payments as $payment)
                        <tr>
                        <td>{{$payment->payment_id}}</td>
                        <td>{{$payment->payer_email}}</td>
                        <td>
                            {{date('F d, Y', strtotime($payment->created_at))}}
                        </td>
                            
                        </tr>
                        @endforeach
                    </table>
    
                    <div class="col-md-12" style="text-align:right;">
                            <!-----The pagination link----->
                            {{$payments->links()}}
                    </div>
                    @else
                    <p>You have no records yet</p>    
                    @endif
                    
                </div>
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
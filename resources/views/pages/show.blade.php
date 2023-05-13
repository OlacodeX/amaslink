
@extends('layouts.main')
<style>


    a.btn-primary{
      color: #b20000;
        background: transparent;
        margin-bottom: 0;
        font-size: 15px;

    }
    a.btn.btn-info.btn-md{
      background: transparent;
      color: #b20000;
      margin-left: 20px;
        border: 1px solid #b20000;
      font-size: 15px;
    }
    a.btn-primary:hover,
    a.btn-info.pull-left:hover{
        background:#b20000;
        color: seashell;
    }
    a.btn-info.pull-left{
        margin-top:20px;
        margin-bottom:300px;
        margin-left: 20px;
        color: #b20000;
        background: transparent;
        margin-bottom: 0;
        font-size: 15px;
        border: 1px solid #b20000;

    }
    a.pull-right{
        margin-top:20px;
        padding-top: 0;
    }
    div.col-sm-9 p{
      font-size: 16px;
      line-height: 1.5em;
    }
a.btn.btn-default{
background: transparent;
border-radius: 0;
font-size: 13px;
border: 1px solid #b20000;
color: #b20000;
margin-bottom: 10px;
}

li{
            list-style: square;
            color: #b20000;
            padding-bottom: 20px;
        }
    .container.bo{
        padding-top: 80px;
        margin-top: 0px;
        margin-bottom: 100px;
        padding-bottom: 300px;

    }
  li a{
text-decoration: none;
color: #b20000;
font-weight: bold;
}
  li a:hover{
text-decoration: none;
color: #b20000;
}
h3.title{
        color: #171919;
        font-weight: bold;
}
      @media only screen and (min-width: 600px) {
  
    .pull-left{
        margin-left: 0;
        margin-top:0px;
        margin-bottom:300px;
        margin-right: 300px;
    }

    }

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  div.container.bo{
        padding-top: 0px;
        margin-top: 0px;
        margin-bottom: 100px;
        padding-bottom: 300px;

    }
  
  .jumbotron h1{
        padding-top: 50px;
        font-weight: bold;
        text-align: center;
        margin-left:0px;
        font-size: 19px;
        }
        h2{
            font-weight: 15px;
        }
.row.main{
    height: 250px;
}
    .col-sm-9 h3{
      font-size: 19px;
      line-height: 1.5em;
      font-weight: bold;
    }
    .col-sm-9{
      padding-bottom: 50px;
    }
    div.col-sm-9 p{
      font-size: 15px;
      line-height: 1.5em;
    }
}
</style>

@section('page_title')
{{config('app.name')}} | {!!$announcements->title!!}
@endsection
@section('content')
<div class="container bo" >
    <div class="row">
    <div class="col-sm-9" style="text-align:justify;">
      <h3>{!!$announcements->title!!}</h3>
      <hr>
      <p>{!!$announcements->content!!}</p>
      <a href="{{URL::previous()}}" class="btn btn-info btn-md pull-right">Back</a><br>
         
      @if (!Auth::guest())
      <!-----If user is not a guest and is the owner of the post show the edit and delete buttons---->
      
          @if (Auth::user()->id == $announcements->user_id)
          <div class="pull-left">
              <a href="./announcements/{{$announcements->id}}/edit" class="btn btn-primary btn-sm edit pull-left" title="Edit Article"><i class="fa fa-edit"></i></a>
                  {!!Form::open(['action' => ['AnnouncementsController@destroy', $announcements->id], 'method' => 'POST', 'class' => 'pull-left'])!!}
                      {{Form::hidden('_method', 'DELETE')}}
                      {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                  {!!Form::close()!!}
          </div> 
          @endif
      
              
@endif
    </div>
    <div class="col-sm-3" style="text-align:justify;">
     
      <h3 class="title">Tags</h3>
      <hr class="hrr">
      <a href="../dashboard" class="btn btn-default">Dashboard</a>
      <a href="../chat" class="btn btn-default">Inbox</a>
      <a href="../alllistings" class="btn btn-default">Ad Listings</a>
      <a href="../contact" class="btn btn-default">Talk To Us</a>
     <a href="../adintro"><img src="img/add.png" alt="" class="img-responsive"></a> 

 
    </div>
</div>
</div>

</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

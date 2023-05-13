
@extends('layouts.mainone')
<style>
    .resp-sharing-button__link,
.resp-sharing-button__icon {
  display: inline-block
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #fff;
  margin: 0.5em
}

.resp-sharing-button {
  border-radius: 5px;
  transition: 25ms ease-out;
  padding: 0.5em 0.75em;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-right: 0.4em;
  vertical-align: top
}

.resp-sharing-button--small svg {
  margin: 0;
  vertical-align: middle
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #fff;
  fill: none
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #fff;
  stroke: none
}

.resp-sharing-button--twitter {
  background-color: #55acee
}

.resp-sharing-button--twitter:hover {
  background-color: #2795e9
}

.resp-sharing-button--pinterest {
  background-color: #bd081c
}

.resp-sharing-button--pinterest:hover {
  background-color: #8c0615
}

.resp-sharing-button--facebook {
  background-color: #3b5998
}

.resp-sharing-button--facebook:hover {
  background-color: #2d4373
}

.resp-sharing-button--tumblr {
  background-color: #35465C
}

.resp-sharing-button--tumblr:hover {
  background-color: #222d3c
}

.resp-sharing-button--reddit {
  background-color: #5f99cf
}

.resp-sharing-button--reddit:hover {
  background-color: #3a80c1
}

.resp-sharing-button--google {
  background-color: #dd4b39
}

.resp-sharing-button--google:hover {
  background-color: #c23321
}

.resp-sharing-button--linkedin {
  background-color: #0077b5
}

.resp-sharing-button--linkedin:hover {
  background-color: #046293
}

.resp-sharing-button--email {
  background-color: #777
}

.resp-sharing-button--email:hover {
  background-color: #5e5e5e
}

.resp-sharing-button--xing {
  background-color: #1a7576
}

.resp-sharing-button--xing:hover {
  background-color: #114c4c
}

.resp-sharing-button--whatsapp {
  background-color: #25D366
}

.resp-sharing-button--whatsapp:hover {
  background-color: #1da851
}

.resp-sharing-button--hackernews {
background-color: #FF6600
}
.resp-sharing-button--hackernews:hover, .resp-sharing-button--hackernews:focus {   background-color: #FB6200 }

.resp-sharing-button--vk {
  background-color: #507299
}

.resp-sharing-button--vk:hover {
  background-color: #43648c
}

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--twitter {
  background-color: #55acee;
  border-color: #55acee;
}

.resp-sharing-button--twitter:hover,
.resp-sharing-button--twitter:active {
  background-color: #2795e9;
  border-color: #2795e9;
}

.resp-sharing-button--whatsapp {
  background-color: #25D366;
  border-color: #25D366;
}

.resp-sharing-button--whatsapp:hover,
.resp-sharing-button--whatsapp:active {
  background-color: #1DA851;
  border-color: #1DA851;
}

    a.btn-primary{
      color: #b20000;
        background: transparent;
        margin-bottom: 0;
        font-size: 15px;

    }
    a.btn.btn-info.btn-sm{
      padding: 0;
      background: transparent;
      color: #b20000;
      border: none;
      margin-left: 20px;
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
    .col-sm-9 p{
      font-size: 18px;
      line-height: 1.5em;
      padding: 10px;
    }
input.btn.btn-default{
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
img.main{
  
  width: 500px;
  height: 300px;
  padding-left: 50px;
  padding-bottom: 20px;
  
        }
.row.main{
        background-color:rgb(26, 26, 26);
        height: 390px;
        background:linear-gradient(rgba(0, 0, 0, 1),rgba(8, 8, 8, 0.863)), url('../img/priest2.jpg') no-repeat;
        background-size: cover;
        background-position: center;
        background-attachment:fixed;
        text-align: center;
    }
    .navbar.navbar-expand-md{
        background-color:transparent; 
        margin-bottom:0px;
    }
    .container.bo{
        padding-top: 80px;
        margin-top: 0px;
        margin-bottom: 100px;

    }
.col-sm-4,
.col-sm-8{
        margin-top: 0;
        padding-top: 100px;
        background: #ffffff;


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
    .col-sm-4 img{
        height:200px;
        width:200px;
    }
    .pull-left{
        margin-left: 0;
        margin-top:0px;
        margin-bottom:300px;
        margin-right: 300px;
    }

    }

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  
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
.col-sm-4 img{
        height:280px;
        width:100%;
    }
}
</style>

@section('page_title')
{{config('app.name')}} | {!!$post->title!!}
@endsection
@section('content')
@include('inc.navotherr')
<div class="container bo" >
    <div class="row">
    <div class="col-sm-9" style="padding-bottom:20px; text-align:justify;">
      <h3 class="title">{!!$post->title!!}</h3><br>
      
        <small>{!!Str::words( $post->created_at,1)!!} / {{$post->author}} / {{$post->category}}</small>
                      <!-- Trigger the modal with a button -->
                      <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-share-alt"></i></a>
  
                      <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content" style="background:transparent; border:none;">
                            <div class="modal-header" style="border:none;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <div class="modal-body" style="background:transparent; border:none;">
                                  <!-- Sharingbutton Facebook -->
                            <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?t={!!$post->title!!}&u={{url()->current()}}" target="_blank" rel="noopener" aria-label="">
                            <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm3.6 11.5h-2.1v7h-3v-7h-2v-2h2V8.34c0-1.1.35-2.82 2.65-2.82h2.35v2.3h-1.4c-.25 0-.6.13-.6.66V9.5h2.34l-.24 2z"/></svg>
                            </div>
                            </div>
                            </a>
                            <!--@if (Auth::guest())
                            <a href="../home" class="btn btn-info btn-md">Dashboard</a>
                            @endif -->
          
                            <!-- Sharingbutton Twitter -->
                            <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text={!!$post->title!!}.&amp;url={{url()->current()}}" target="_blank" rel="noopener" aria-label="">
                            <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0C5.38 0 0 5.38 0 12s5.38 12 12 12 12-5.38 12-12S18.62 0 12 0zm5.26 9.38v.34c0 3.48-2.64 7.5-7.48 7.5-1.48 0-2.87-.44-4.03-1.2 1.37.17 2.77-.2 3.9-1.08-1.16-.02-2.13-.78-2.46-1.83.38.1.8.07 1.17-.03-1.2-.24-2.1-1.3-2.1-2.58v-.05c.35.2.75.32 1.18.33-.7-.47-1.17-1.28-1.17-2.2 0-.47.13-.92.36-1.3C7.94 8.85 9.88 9.9 12.06 10c-.04-.2-.06-.4-.06-.6 0-1.46 1.18-2.63 2.63-2.63.76 0 1.44.3 1.92.82.6-.12 1.95-.27 1.95-.27-.35.53-.72 1.66-1.24 2.04z"/></svg>
                            </div>
                            </div>
                            </a>
          
                            <!-- Sharingbutton WhatsApp -->
                            <a class="resp-sharing-button__link" href="whatsapp://send?text={!!$post->title!!}.{{url()->current()}}" target="_blank" rel="noopener" aria-label="">
                            <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 24 24"><path d="m12 0c-6.6 0-12 5.4-12 12s5.4 12 12 12 12-5.4 12-12-5.4-12-12-12zm0 3.8c2.2 0 4.2 0.9 5.7 2.4 1.6 1.5 2.4 3.6 2.5 5.7 0 4.5-3.6 8.1-8.1 8.1-1.4 0-2.7-0.4-3.9-1l-4.4 1.1 1.2-4.2c-0.8-1.2-1.1-2.6-1.1-4 0-4.5 3.6-8.1 8.1-8.1zm0.1 1.5c-3.7 0-6.7 3-6.7 6.7 0 1.3 0.3 2.5 1 3.6l0.1 0.3-0.7 2.4 2.5-0.7 0.3 0.099c1 0.7 2.2 1 3.4 1 3.7 0 6.8-3 6.9-6.6 0-1.8-0.7-3.5-2-4.8s-3-2-4.8-2zm-3 2.9h0.4c0.2 0 0.4-0.099 0.5 0.3s0.5 1.5 0.6 1.7 0.1 0.2 0 0.3-0.1 0.2-0.2 0.3l-0.3 0.3c-0.1 0.1-0.2 0.2-0.1 0.4 0.2 0.2 0.6 0.9 1.2 1.4 0.7 0.7 1.4 0.9 1.6 1 0.2 0 0.3 0.001 0.4-0.099s0.5-0.6 0.6-0.8c0.2-0.2 0.3-0.2 0.5-0.1l1.4 0.7c0.2 0.1 0.3 0.2 0.5 0.3 0 0.1 0.1 0.5-0.099 1s-1 0.9-1.4 1c-0.3 0-0.8 0.001-1.3-0.099-0.3-0.1-0.7-0.2-1.2-0.4-2.1-0.9-3.4-3-3.5-3.1s-0.8-1.1-0.8-2.1c0-1 0.5-1.5 0.7-1.7s0.4-0.3 0.5-0.3z"/></svg>
                            </div>
                            </div>
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
          
                </a>
      <hr>
      <img src="{{ URL::to('img/cover_images/'.$post->cover_image)}}" class="img-responsive main pull-right" alt="{!!$post->title!!} image">
           
      <p>{!!$post->body!!}</p>
      <br><br><a href="{{ URL::previous() }}" class="btn btn-info btn-md pull-left">Back</a><br>
  
    </div>
    <div class="col-sm-3" style="padding-bottom:20px; text-align:justify;">
      <h3 class="title">Popular Articles</h3>
               
        @foreach (
          // Loop through them
          $mostRs as $mostR
          )
           <li><a href="{{ route('blog.show', $mostR->slug) }}">{{$mostR->title}}</a></li>
           @endforeach
           
           <h3 class="title">Categories</h3>
           <hr class="hrr">
            
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_1']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'CURRENCY TRADING')}}
                {{Form::submit('CURRENCY TRADING', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_2']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'MINERAL, CRUDE OIL')}}
                {{Form::submit('MINERAL/CRUDE OIL', ['class' => 'btn btn-default', 'style' => 'text-transform:uppercase;'])}}
               
              
               ({{App\Models\Listings::where('category', 'MINERAL, CRUDE OIL')->where('status', 'approved')->count()}})
          
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'BUSINESS SALES')}}
                {{Form::submit('BUSINESS SALES', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'MOBILE,ELECTRONICS')}}
                {{Form::submit('MOBILE,ELECTRONICS', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'JOBS')}}
                {{Form::submit('JOBS', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'REAL ESTATE, LANDS')}}
                {{Form::submit('REAL ESTATE, LANDS', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'AUTOMOBILES')}}
                {{Form::submit('AUTOMOBILES', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'KIDS AND BABIES')}}
                {{Form::submit('KIDS AND BABIES', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           {!! Form::open(['action' => 'PagesController@category', 'method' => 'GET', 'id' => 'my_form_4']) /** The action should be the block of code in the store function in PostsController
           **/ !!}
                {{Form::hidden('category', 'SPORT')}}
                {{Form::submit('SPORT', ['class' => 'btn btn-default'])}}
               
           {!! Form::close() !!}
           <h3 class="title">Tags</h3>
           <hr class="hrr">
           <a href="../Posts" class="btn btn-default">Blog</a>
           <a href="../communities" class="btn btn-default">Forum</a>
           <a href="../alllistings" class="btn btn-default">Ad Listings</a>
           <a href="../contact" class="btn btn-default">Talk To Us</a>
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

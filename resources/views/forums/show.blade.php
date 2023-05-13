
@extends('layouts.main')
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

div.comment .panel-default,
  div.comment .panel{
    padding-top: 0px;
    padding-bottom: 0;
    background: #f5f5f5;
    
  }
  div.comment .panel-default .panel-heading{
    padding-top: 5px;
    height: 39px;
    padding-bottom: 15px;
    color: #171919;
    font-weight: bold;
    
  }
  div.comment .panel-default .panel-heading a{
    text-decoration: none;
    color: #171919;
    font-weight: bold;
    
  }
  div.comment .panel-default .panel-body p{
    font-size: 13px;
    color: #777;
  }
  div.comment .panel-default .panel-body{
    padding-left: 2px;
    padding-right: 2px;
  }
  div.comment div.panel-default div.panel-footer{
    padding-bottom: 0px;
    margin-bottom: 0;
    background: transparent;
    height: 20px;
  }
  div.comment .panel-default .fa{
    color: #b20000;
  }
.btn.btn-success{
background: transparent;
border-radius: 0;
font-size: 13px;
border: 1px solid #b20000;
color: #b20000;
margin-bottom: 10px;
}
input.btn.btn-default{
background: transparent;
border-radius: 0;
font-size: 13px;
border: 1px solid #b20000;
color: #b20000;
margin-bottom: 10px;
}
    a.btn-primary{
      color: #b20000;
        background: transparent;
        margin-bottom: 0;
        font-size: 15px;

    }
    .btn.btn-primary.btn-sm.edit{
      color: #b20000;
        background: transparent;
        margin-bottom: 0;
        font-size: 10px;
        padding: 0;
        border: none;

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
a.btn.btn-default{
background: transparent;
border-radius: 0;
font-size: 13px;
border: 1px solid #b20000;
color: #b20000;
margin-bottom: 10px;
}
.btn.btn-danger{
background: transparent;
border-radius: 0;
font-size: 9px;
border: 1px solid #b20000;
color: #b20000;
margin-bottom: 0;
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
h3.title.first{
        color: #171919;
        font-weight: bold;
        padding-right: 50px;
        font-size: 25px;
        padding-bottom: 0;
}
h3.title{
        color: #171919;
        font-weight: bold;
}
h3.title span {
color: #b20000;
font-weight: bold;
}
h3.title,
h2.title{
font-weight: bold;
padding-bottom: 0px;
}
.col-sm-9 .page-item.active .page-link {
z-index: 1;
color: #fff;
background-color: #b20000;
border-color: #b20000;
}
.col-sm-9 .page-item .page-link {
color: #b20000;
}
                div.pull-right button{
                  background: transparent;
                  border: none;
                }
                div.pull-right .fa{
                  font-size: 20px;
                }
                div.pull-right span{
                  font-size: 20px;
                  color: #b20000;
                }
      @media only screen and (min-width: 600px) {
    .col-sm-4 img{
        height:200px;
        width:200px;
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
{{config('app.name')}} | {!!$topics->topic!!}
@endsection
@section('content')
@include('inc.navotherr')
<div class="container bo" >
    <div class="row">
    <div class="col-sm-9" style="padding-bottom:20px; text-align:justify;">
      <h3 class="title first">{!!$topics->topic!!}</h3>
        <small>{!!Str::words( $topics->created_at,1)!!} / {{$topics->user_name}}</small><br>
        
        @if (!Auth::guest())
        <!-----If user is not a guest and is the owner of the post show the edit and delete buttons---->
        
            @if (Auth::user()->id == $topics->user_id)
                <a href="../communities/{{$topics->id}}/edit" class="btn btn-primary btn-sm edit pull-left" title="Edit Article"><i class="fa fa-edit"></i></a>
                    {!!Form::open(['action' => ['PostsController@destroy', $topics->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                    {!!Form::close()!!}
                    
            @endif
                
@endif
<div class="text-justify comment">
  <hr>
  @include('inc.messages')          
    @if (
        //if there is data in the db
    count($comments) > 0
    )
        @foreach (
            // Loop through them
            $comments as $comment
            )
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href=""><i class="fa fa-user"></i>{!!$comment->commenter_name!!}</a>
                <?php
               $user = App\User::where('id', $comment->commenter_id)->first();
                $from  = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user->created_at);
                $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', \Carbon\Carbon::now());
                $diff_in_months = $to->diffInMonths($from);
                //print_r($diff_in_months);
                //$years gives me in y,m,d format
                $dateOfBirth = auth()->user()->created_at;
                $years = \Carbon\Carbon::parse($dateOfBirth)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
                  ?>
                <i class="fa fa-calendar"></i>Member For {!!$diff_in_months!!} Month(s)
                <small class="pull-right"><i class="fa fa-calendar"></i>{!!$comment->created_at!!}</small>
              </div>
              <div class="panel-body">
                
              <p>
                {!!$comment->comment!!}
            </p>
            <div class="panel-footer">
              
        @if (!Auth::guest())
        <!-----If user is not a guest and is the owner of the post show the edit and delete buttons---->
        
            @if (Auth::user()->id == $comment->commenter_id)
            <div class="pull-left">
                <a href="../comments/{{$comment->id}}/edit" class="btn btn-primary btn-sm edit pull-left" title="Edit Article"><i class="fa fa-edit"></i></a>
                    {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'pull-left'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                    {!!Form::close()!!}
            </div> 
            @endif
        
                
              @endif
               
                  {{ Form::open(array('action' => 'ForumController@like')) }}  
                  {{Form::hidden('id', $comment->id)}} 
                  <div class="pull-right">
                    @if (empty(App\User::find(auth()->user()->id)->likes()->where('user_id', '=',  auth()->user()->id)->where('comment_id', '=',  $comment->id)->first()))
                         
                    <span>{{App\Likes::where('comment_id', $comment->id)->count()}}</span><button type="submit" onclick="myFunction(this)" title="Like" class="fa fa-thumbs-o-up"></button>
                  @else
                  <span>{{App\Likes::where('comment_id', $comment->id)->count()}}</span><button type="submit" onclick="myFunction(this)" title="Unlike" class="pull-right fa fa-thumbs-o-down"></button>
                  @endif
                </div>
                   {{ Form::close() }}
            </div>
              </div>
              

            </div>

      @endforeach

      <div class="pagn" style="margin-top:30px; margin-left:0;padding-left:0;">
            <!-----The pagination link----->
            {{$comments->links()}}
      </div>

  @else
  <p>No comments yet</p>
      
  @endif
  <!---If file upload is involved always add enctype to your opening
      form tag and set it to multipart/form-data--->
      <h3 class="title">Contribute To The <span>Discussion</span></h3>
 {!! Form::open(['action' => 'CommentsController@store','method' => 'POST']) /** The action should be the block of code in the store function in PostsController
 **/ !!}
  <div class="form-group">
    {{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Your comment'],'required')}}
  </div>
  {{Form::hidden('topic_id', $topics->id)}}
  {{Form::submit('Add Comment', ['class' => 'btn btn-success btn-md pull-left', 'style' => 'text-transform:uppercase;'])}}
 {!! Form::close() !!}
</div> 

      <p></p>
      <br><br><a href="{{ URL::previous() }}" class="btn btn-info btn-md pull-left">Back</a><br>
  
    </div>
    <div class="col-sm-3" style="padding-bottom:20px; text-align:justify;">
      <h3 class="title" style="padding-bottom:2px; margin-bottom:2px;">Popular Articles</h3>
        <hr>
        @foreach (
          // Loop through them
          $mostRs as $mostR
          )
           <li style="padding-bottom:2px; margin-bottom:2px;"><a href="../Posts/{{$mostR->id}}">{{$mostR->title}}</a></li>
           <small style="padding-top: 3px; margin-top:3px;"><span class="fa fa-calendar"></span>{{date('F d, Y', strtotime($mostR->created_at))}}</small>
           @endforeach
           
           <h3 class="title" style="padding-bottom:2px; margin-bottom:2px;">Categories</h3>
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
               
              
               ({{App\Listings::where('category', 'MINERAL, CRUDE OIL')->where('status', 'approved')->count()}})
          
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
           <a href="../Posts" class="btn btn-default">Blogs</a>
           <a href="../communities" class="btn btn-default">Forum</a>
           <a href="../listings" class="btn btn-default">Ad Listings</a>
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
@section('js')
@endsection
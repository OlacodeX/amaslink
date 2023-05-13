@extends('layouts.mainone')
@section('page_title')
{{config('app.name')}} - Best Free Classified Ads | Forum
@endsection
@include('inc.css.announcement')
@section('content')
            @include('inc.navd')
            <div class="" id="main" style="margin-left:250px">
    <div class="row forum">
            
        <div class="w3-container">
            <div class="col-sm-9">
                <h3 class="title text-justify" style="padding-bottom:20px;">AMASLINK <span>ANNOUNCEMENTS</span></h3>
    
                <div class="panel panel-default">
                        @if (
                            //if there is data in the db
                        count($announcements) > 0
                        )
                        @foreach (
                            // Loop through them
                            $announcements as $announcement
                            )
                        <a href="announcements/{{$announcement->id}}" style="text-decoration:none;color:#b20000;">
                        
                        <div class="panel-body">
                        <p>{{$announcement->title}}</p>
                        <span><i class="fa fa-clock-o"></i>{{$announcement->created_at}}</span><i class="fa fa-user"></i>
                        <hr>    
                           @if (!Auth::guest())
                        <!-----If user is not a guest and is the owner of the post show the edit and delete buttons---->
                        
                            @if (Auth::user()->id == $announcement->user_id)
                            <div class="pull-left">
                                <a href="./announcements/{{$announcement->id}}/edit" class="btn btn-primary btn-sm edit pull-left" title="Edit Article"><i class="fa fa-edit"></i></a>
                                    {!!Form::open(['action' => ['AnnouncementsController@destroy', $announcement->id], 'method' => 'POST', 'class' => 'pull-left'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                    {!!Form::close()!!}
                            </div> 
                            @endif
                        
                                
                @endif
                    </div>
                </a>
                        @endforeach
    
                        <div class="col-md-12" style="text-align:right;">
                                <!-----The pagination link----->
                                {{$announcements->links()}}
                        </div>
                            @else
                            <p>No record found</p>
                                
                            @endif
                </div>
            </div>
            <div class="col-sm-3">
                
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
            <a href="./Posts" class="btn btn-default">Blog</a>
            <a href="./communities" class="btn btn-default">Forum</a>
            <a href="./alllistings" class="btn btn-default">Ad Listings</a>
            <a href="./contact" class="btn btn-default">Talk To Us</a>
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
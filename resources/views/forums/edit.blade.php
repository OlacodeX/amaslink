@extends('layouts.main')
@section('page_title')
{{config('app.name')}} | Edit Post
@endsection
<style>
        label{
            font-family: 'Fira Code', monospace;
        }
               
.container.edit{
    margin-top:30px; 
    padding-bottom:100px;
    margin-bottom: 200px;
    width:80%;
}
h1.title{
    margin-bottom: 50px;
}
.btn.btn-success,
.btn.btn-primary.btn-md{
background: #b20000;
border: none;
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
@media only screen and (max-width: 768px) {   
    
    div.container.create{
        margin-top:50px; 
        padding-bottom:10px;
        width:80%;
        border: 1px solid #f9f9f9;
        background: #f9f9f9;
        padding-top: 10px;
        margin-bottom: 50px;
    }
    div.container.create .row{
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
@include('inc.navadmininner')
<div class="container edit">
    <h3 class="title">Edit <span>Topic</span></h3>
    @include('inc.messages')
   {!! Form::open(['action' => ['ForumController@update', $topics->slug]/**the id tells it the post to update*/, 'method' => 'POST',  'enctype' => 'multipart/form-data']) /** The action should be the block of code in the store function in PostsController
   **/ !!}
    <div class="form-group">
        <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
    {{Form::label('forum name', 'Forum Name')}}
    <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
    {{Form::text('name', $topics->forum_name, [ 'class' => 'form-control', 'placeholder' => 'Forum Name'])}}
</div>
    <div class="form-group">
            <!--This is the lable for the field. The first parameter is the lable for, while the second is the name it will carry--->
        {{Form::label('topic', 'Topic')}}
        <!--This is the input field with type=text, name=title, value='' since it is a text field, then bootstrap class and then placeholder--->
        {{Form::text('topic', $topics->topic, [ 'class' => 'form-control', 'placeholder' => 'Discussion Topic'])}}
    </div>
    <!---To update in laravel the form method must be PUT but we can have that in normal form tag
        So we create the hidden type below--->
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Update Topic', ['class' => 'btn btn-success btn-md pull-left', 'style' => 'text-transform:uppercase;'])}}
   {!! Form::close() !!}
<p class="pull-right edit">
    <a href="../../communities" class="btn btn-success btn-md">Forum</a>
    <a href="../../superadmin" class="btn btn-success btn-md">Dashboard</a>

</p>

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
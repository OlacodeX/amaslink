@extends('layouts.main')
<style>
    
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
    width:80%;
    border:none;
    background: white;
    padding-top: 30px;
    margin-left: 80px;
}
h3.title span {
color: #b20000;
font-weight: bold;
}
h3.title{
font-weight: bold;
padding-bottom: 30px;
}
.btn.btn-primary{
    border:none;
    background: #b20000;
    color: #f1f1f1;
}
.btn.btn-primary:hover{
    border:1px solid #b20000;
    background: transparent;
    color: #b20000;
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
<div class="container create">
    @include('inc.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="title">Update <span>Profile</span></h3></div>

                <div class="card-body">
                    {!! Form::open(['action' => ['UpdateuserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
                        @csrf

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                                <input id="u_name" type="text" class="form-control @error('u_name') is-invalid @enderror" name="u_name" value="{{ $user->u_name}}" autocomplete="u_name" autofocus>

                                @error('u_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="first name">{{ __('First Name') }}</label>
                                <input id="f_name" type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{ $user->name }}" autocomplete="f_name" autofocus>

                                @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="form-group">
                                <label for="last name">{{ __('Last Name') }}</label>
                                    <input id="l_name" type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{ $user->l_name }}" autocomplete="l_name" autofocus>
    
                                    @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                            <div class="col-sm-12">
                            <div class="form-group">
                                <label for="phone">{{ __('Phone Number') }}</label>
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" autocomplete="phone">
    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="country">{{ __('Country') }}</label>
                                        <input id="country" type="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $user->country }}" autocomplete="country">
        
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="twitter">{{ __('Twitter') }}</label>
                                                <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $user->twitter }}" autocomplete="twitter" autofocus>
                
                                                @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="facebook">{{ __('Facebook') }}</label>
                                                    <input id="fb" type="text" class="form-control @error('fb') is-invalid @enderror" name="fb" value="{{ $user->fb }}" autocomplete="fb" autofocus>
                    
                                                    @error('fb')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                    </div>




                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="linkd">{{ __('Linkd') }}</label>
                                                <input id="linkd" type="text" class="form-control @error('linkd') is-invalid @enderror" name="linkd" value="{{ $user->linkd }}" autocomplete="linkd" autofocus>
                
                                                @error('linkd')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="behance">{{ __('Behance') }}</label>
                                                    <input id="behance" type="text" class="form-control @error('behance') is-invalid @enderror" name="behance" value="{{ $user->behance }}" autocomplete="behance" autofocus>
                    
                                                    @error('behance')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="youtube">{{ __('YouTube') }}</label>
                                                <input id="ytube" type="text" class="form-control @error('ytube') is-invalid @enderror" name="ytube" value="{{ $user->ytube }}" autocomplete="ytube" autofocus>
                
                                                @error('ytube')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="vimeo">{{ __('Vimeo') }}</label>
                                                    <input id="vimeo" type="text" class="form-control @error('vimeo') is-invalid @enderror" name="vimeo" value="{{ $user->vimeo }}" autocomplete="vimeo" autofocus>
                    
                                                    @error('vimeo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="instagram">{{ __('Instagram') }}</label>
                                                <input id="insta" type="text" class="form-control @error('insta') is-invalid @enderror" name="insta" value="{{ $user->insta }}" autocomplete="insta" autofocus>
                
                                                @error('insta')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="flickr">{{ __('Flickr') }}</label>
                                                    <input id="flickr" type="text" class="form-control @error('flickr') is-invalid @enderror" name="flickr" value="{{ $user->flickr }}" autocomplete="flickr" autofocus>
                    
                                                    @error('flickr')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="website">{{ __('Website') }}</label>
                                                <input id="web" type="url" class="form-control @error('web') is-invalid @enderror" name="web" value="{{ $user->web }}" autocomplete="web" autofocus>
                
                                                @error('web')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="form-group">
                                            {{Form::label('profile picture', 'Profile Picture')}}
                                           {{Form::file('pp', ['class' => 'form-control'])}}
                                    </div>
                                </div>
                        <div class="col-sm-12">
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ URL::previous() }}" class="btn btn-primary pull-right">Back</a>
                            </div>
                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        {!! Form::close() !!}
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

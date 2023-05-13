@extends('layouts.main')
<style>
    
    .top{
        color: #b20000;
        background: #dff2fe;
        margin-top: 0px;
        padding-top: 0px;
        border-radius: 3px;
    }
    .top p{
        padding: 20px;
    }
    .fa.fa-info-circle{
        color: #0178ff;
    }
    
div.container.create{
    margin-top:30px; 
    padding-bottom:10px;
    width:80%;
    border: 1px solid #f9f9f9;
    background: #f9f9f9;
    padding-top: 10px;
    margin-bottom: 0px;
}
div.container.create .row{
    margin-top:10px; 
    padding-bottom:50px;
    width:80%;
    border:none;
    background: white;
    padding-top: 10px;
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
}
.btn.btn-primary:hover{
    border:1px solid #b20000;
    background: transparent;
    color: #b20000;
}
    @media only screen and (max-width: 768px) {   
    
    div.container.create{
        margin-top:10px; 
        padding-bottom:0px;
        width:80%;
        border: 1px solid #f9f9f9;
        background: #f9f9f9;
        padding-top: 10px;
        margin-bottom: 0px;
    }
    div.container.create .row{
        margin-top:20px; 
        padding-bottom:0px;
        width:100%;
        border:none;
        background: white;
        padding-top: 0px;
        margin-left: 0px;
    }
    
}
</style>
@section('content')
@include('inc.navother')
<div class="container create">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center"><h3 class="title">Login To Access Your Account<span>Now</span></div>

                    <div class="top">
                        <p class="top"><i class="fa fa-info-circle"></i> 
                            If you have an account with us on or before 17th of June 2020, You are required to set a new password for your account by clicking the forgot password button and following the prompt as the old passwords as been deactivated. This is in a bid to ensure safe transaction on our platform.
                        </p>
                    </div><br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address/Username') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="identity" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
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
      <!-----For modal pop up---->
  <script>
  
    $('#overlay').modal('show');
    </script>
@endsection

<style>
    footer{
       background: #171919;
       padding-top: 15px;
       padding-bottom: 20px;
       color: #f1f1f1;
    }
    footer a{
        color: #f1f1f1;
        text-decoration: none;

    }
    footer .fa{
        color: #b20000;
    }
    footer a:hover{
        color: #b20000;
        text-decoration:wavy;

    }
    footer h3.title{
        color: #f1f1f1;
        font-weight: bold;
        text-transform: uppercase;
    }
    footer .col-sm-5 p,
    footer .col-sm-5 p a{
        padding-top: 30px;
        font-size: 13px;
        text-align: justify;
        color: #f1f1f1;
        text-decoration: none;

    }
    
    footer .col-sm-4 .row{
        padding-top: 10px;


    }
    footer .col-sm-3 li{
        list-style: square;
        color: #b20000;
    }
    footer .col-sm-3 li a{
        text-decoration: none;
        color: #f1f1f1;
    }
    footer div.col-sm-4 div.row div.col-sm-4 img{
        margin-bottom: 20px;

    }
    .text-center.foot{
        background: #f1f1f1;
        padding-top: 10px;
        color: #b20000;
        margin-bottom: 0;
        padding-bottom: 10px;
        font-size: 10px;
    }
    .fa.fa-arrow-up{
        color: #f1f1f1;
        font-size: 10px;
    }
    
footer .image {
  display: block;
  width: 100%;
  height: 80px;
}

footer div.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 80%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  background-color: #b20000bb;
  color: #eee;
}
footer div.overlay p{
    padding-top: 0px;
}
footer div.container.folio:hover .overlay{
  opacity: 1;
}

footer a.icon .fa.fa-plus-circle{
  color: #eee;
  font-size: 15px;
  position: absolute;
  left: 50%;
  font-weight: bold;
  padding-bottom: 20px;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
  footer div.container.folio {
  position: relative;
  width: 100%;
  margin: 0;
  padding: 0;
}
.container.form{
    padding: 30px 150px;  
}
.btn.btn-primary {
              background: tomato;
              border: none;
              font-size: 11px;
              letter-spacing: 3px;
              padding: 12px 80px;
              border-radius: 0;
          }
input.form-control{
    border-radius:0;
    height:40px;
}
    @media only screen and (max-width: 768px) {

    footer div.col-sm-4 div.row div.col-sm-4{
        float: left;
        width: 50%;

    }
    footer h3.title{
        color: #f1f1f1;
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
    }
    .text-center.foot p{
        font-size: 8px;
        padding: 15px;
    }
footer div.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 90%;
  width: 100%;
  opacity: 0;
  transition: .3s ease;
  background-color: #b20000bb;
  color: #eee;
}
    }
</style>
    <div class="container-fluid text-center">
        <div class="container form">
            <h2 class="title">Subscribe our Newsletter</h2>
            <p>Subscribe to our mailing list to get the latest updates straight in your inbox.</p>
                {!! Form::open(['method' => 'post', 'action' => 'SuperadminController@emails']) !!}
                    @csrf
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2">
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                    
                {!! Form::close() !!}
        </div>
    </div>

<footer>
    <div class="container">
        <div class="col-sm-5 text-justify">
            <h3 class="text-justify title">ABOUT US</h3>
            <img src="img/AMAS.png" alt="" class="img-responsive">
            <p>
                AMASLINK is fast-growing free online classifieds with advanced security system. We provide a 
                simple hassle-free solution to sell and buy almost anything, anytime,anywhere.
            </p>
            <p>
                <a style="" href="mailto:Support@amaslink.com?Subject=Hello Amaslink, I Have an Enquiry"><i class="fa fa-envelope-o"></i>Support@amaslink.com</a>
            </p>
        </div>
        <div class="col-sm-4 text-justify">
            <h3 class="text-justify title">Latest Ads</h3>
            <div class="row">

                @if (
                    //if there is data in the db
                count($latests) > 0
                )
                    @foreach (
                        // Loop through them
                        $latests as $latest
                        )
                <a href="listings/{{$latest->id}}" title="{{$latest->title}}">
                <div class="col-sm-4">
                    <div class="container folio">
                    <img src="{{ URL::to('img/cover_images/listings/'.$latest->image1)}}" alt="listing image" class="img-responsive image">
                    <div class="overlay">
                        <p>
                            <a href="listings/{{$latest->id}}" class="icon" title="{{$latest->title}}">
                            <i class="fa fa-plus-circle"></i>
                            </a>
                        </p>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            
                @endif 
            </div>
        </div>
        <div class="col-sm-3 text-justify">
            <h3 class="text-justify title">QUICK LINKS</h3>
            <li><a href="/alllistings">Listing</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/help">How To Post Ads</a></li>
            <h3 class="text-justify title">Recent PoSts</h3>
             
        @if (
            //if there is data in the db
        count($posts) > 0
        )
            @foreach (
                // Loop through them
                $posts as $post
                )
            <p><a href="Posts/{{$post->id}}">{{$post->title}}</a></p>
            <small><span class="fa fa-calendar"></span>{{date('F d, Y', strtotime($post->created_at))}}</small>
            @endforeach
            
                    @endif    
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
        
 <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>


</footer>
<div class="bottom">
    @include('cookie-consent::index')
</div>
<div class="text-center foot">
    
        
    <p class="text-center">&copy 2021 AMASLINK | All rights reserved | Designed by <a href="" style="color:#b2000095; font-weight:bold;">Gowwwide Tech</a> </p>
    <a  style="float:left; text-decoration:none;background:#b20000; color:#f1f1f1; border-radius:15px;" class="btn btn-default up" href="#myPage" onclick="topFunction()" id="myBtn">
        <span class="fa fa-arrow-up"></span> 
    </a>
</div>

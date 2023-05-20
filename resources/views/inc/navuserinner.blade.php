<style>

  #navbar {
    overflow: hidden;
    background: #f1f1f1;
  }
  
  .sticky {
    position: fixed;
    top: 0;
    width: 102%;
    z-index: 1;
  }
  
  .sticky + .content {
    padding-top: 60px;
  }
  
    .container-fluid.top{
      background-color:#b20000; 
      margin-bottom:0;
      padding: 5px 150px 5px 150px;
      color: #f1f1f1;
    }
    .container-fluid.top .fa,
    .container-fluid.top a{
      font-size: 10px;
      font-weight: bold;
      padding-top: 10px;
    }
    .container-fluid.top span.float{
      float:right;
      color: #f1f1f1;
      padding-right: 100px;
    }
    .container-fluid.top .nav.navbar-nav.navbar-right{
          padding-top: 0px;
          padding-right: 10px;
          font-weight: bold;
          color: #f1f1f1;
        border: none;
      }
      .container-fluid.top .nav.navbar-nav.navbar-right li.nav-item a.nav-link{
          font-weight: bold;
      font-size: 10px;
          line-height: 1.5em;
          color: #f1f1f1;
          border: none;
          text-decoration: wavy;
          background: transparent;
      }
      .container-fluid.top .nav.navbar-nav.navbar-right li a.btn.btn-info{
          font-weight: 700;
          font-size: 15px;
          line-height: 1.5em;
          color: #b2000093;
          background: transparent;
          border: solid 1px #b20000;
          padding: 5px 15px;
          margin-top: 5px;
      }
      nav.navbar.navbar-default div.container-fluid,
      nav.navbar.navbar-default,
      .navbar-header{
          background-color: transparent;
          border: none;
      }
      nav.navbar.navbar-default div.container-fluid{
        background: transparent;
      }
      .nav.navbar-nav.navbar-right{
          padding-top: 15px;
          padding-right: 10px;
          font-weight: bold;
          color: #2b2732;
        border: none;
      }
      .nav.navbar-nav.navbar-right li a{
          font-weight: bold;
          font-size: 10px;
          line-height: 1.5em;
          color: #b2000093;
          border: none;
      }
      .nav.navbar-nav.navbar-right li a:hover{
          font-weight: 900;
          font-size: 12px;
          line-height: 1.5em;
          color: #b20000;
          border-bottom: 3px solid #b20000;
      }
      .nav.navbar-nav.navbar-right li a.btn.btn-info{
          font-weight: 700;
          font-size: 15px;
          line-height: 1.5em;
          color: #b2000093;
          background: transparent;
          border: solid 1px #b20000;
          padding: 5px 15px;
          margin-top: 5px;
      }
      .nav.navbar-nav.navbar-right li a.btn.btn-info:hover{
          font-weight: 700;
          font-size: 15px;
          line-height: 1.5em;
          color: #f1f1f1;
          background: #b20000;
          border: solid 1px #b20000;
          
      }
      a.navbar-brand img{
        margin-top: 0;
        padding-top: 0px;
        height: 90px;
        padding-bottom: 50px;
        border: none;
      }
  
      a.navbar-brand{
        padding-top: 10px;
        padding-left: 30px;
        border: none;
      }
      button.navbar-toggle{
        border: none;
        background: transparent;
        border: none;
        opacity: 1;
        color: transparent;
      }
      button:hover{
        border: none;
        outline: 0;
        opacity: 0.7;
      }
      div.collapse.navbar-collapse{
        border: none;
        border-bottom: none;
        border-top: none;
      }
      
    .collapse.navbar-collapse p{
      display: none;
    }
    @media only screen and (min-width: 600px) {
     
     .sticky a.navbar-brand{
       padding-top: 20px;
       padding-left: 30px;
       border: none;
     }
 
     a.navbar-brand img{
       margin-top: 0;
       padding-top: 0px;
       height: 80px;
       padding-bottom: 50px;
       border: none;
     }
    a.navbar-brand{
      padding-top: 20px;
      padding-left: 39px;
      border: none;
    }
    .navbar.navbar-default{
      border-radius: 0;
    }
     .nav.navbar-nav.navbar-right li a{
         font-weight: 600;
         font-size: 13px;
         line-height: 1.5em;
         color: #b2000093;
         border: none;
         padding-left: 0px;
         z-index: 100;
     }
     .nav.navbar-nav.navbar-right li a:hover{
         font-weight: 600;
         font-size: 13px;
         line-height: 1.5em;
         border-bottom: none;
         text-decoration: wavy;
     }
     div.navbar-header{
       padding: 0;
       margin: 0;
     }
     .nav.navbar-nav.navbar-right li a.btn.btn-info{
         font-weight: 500;
         font-size: 13px;
         line-height: 1.5em;
         color: #b2000093;
         background: transparent;
         border: solid 1px #b20000;
         padding: 5px 15px;
         margin-top: 5px;
         margin-left: 20px;
     }
     button.navbar-toggle{
       border: none;
       margin-top: 20px;
     }
     button i.fa.fa-list{
       font-size: 30px;
       font-weight: normal;
       background: transparent;
       border: none;
       padding: 0;
       color: #b20000;
       padding-right: 20px;
     }
 div.collapse.navbar-collapse{
   z-index: 100;
     }
   }
      @media only screen and (max-width: 768px) {
    .collapse.navbar-collapse p{
      display:inline;
      padding-left: 50px;
      padding-top: 50px;
    }
  .sticky {
    position: fixed;
    top: 0;
    width: 105%;
    z-index: 1;
  }
        
    .container-fluid.top{
      background-color:#b20000; 
      margin-bottom:0;
      padding: 2px 0px 2px 0px;
      color: rgba(68, 221, 97, 0.92);
    }
    .container-fluid.top .fa,
    .container-fluid.top p a{
      font-size:9px;
      font-weight: bold;
      display: none;
    }
    .container-fluid.top span.float{
      padding-top: 0;
      color: rgba(68, 221, 97, 0.92);
      padding-right: 20px;
      display: none;
    }
    .container-fluid.top .nav.navbar-nav.navbar-right{
          padding-top: 0px;
          padding-right: 0px;
          font-weight: bold;
          color: #f1f1f1;
        border: none;
      }
    .container-fluid.top .nav.navbar-nav.navbar-right{
          padding-top: 0px;
          padding-right: 0px;
          font-weight: bold;
          color: #f1f1f1;
          padding-left: 30px;
        border: none;
      }
      .container-fluid.top .nav.navbar-nav.navbar-right li.nav-item a.nav-link{
          font-weight: bold;
          font-size: 11px;
          line-height: 0.5em;
          color: #f1f1f1;
          border: none;
          padding-left: 10px;
          text-decoration: wavy;
          background: transparent;
          float: left;
      }
      
      .container-fluid.top .nav.navbar-nav.navbar-right li.nav-item{
        display: inline;
      }
      
      a.navbar-brand img{
        margin-top: 0;
        padding-top: 0px;
        height: 90px;
        padding-bottom: 50px;
        border: none;
      }
      a.navbar-brand{
        padding-top: 10px;
        padding-left: 10px;
        border: none;
      }
      .nav.navbar-nav.navbar-right li a{
          font-weight: 500;
          font-size: 13px;
          line-height: 1.5em;
          color: #b2000093;
          border: none;
          padding-left: 50px;
          z-index: 100;
      }
      .nav.navbar-nav.navbar-right li a:hover{
          font-weight: 600;
          font-size: 12px;
          line-height: 1.5em;
          border-bottom: none;
          text-decoration: wavy;
      }
      .nav.navbar-nav.navbar-right li a.btn.btn-info{
          font-weight: 600;
          font-size: 12px;
          line-height: 1.5em;
          color: #b2000093;
          background: transparent;
          border: solid 1px #b20000;
          padding: 5px 15px;
          margin-top: 5px;
          margin-left: 20px;
      }
      button.navbar-toggle{
        border: none;
        margin-top: 20px;
      }
      button i.fa.fa-list{
        font-size: 30px;
        font-weight: normal;
        background: transparent;
        border: none;
        padding: 0;
        color: #b20000;
        padding-right: 20px;
      }
  
      }
  /***
  .nav.navbar-nav.navbar-right li a .fa-twitter{
      color: rgb(48, 206, 206);
      font: 100;
      color: aliceblue;
      font-size: 15px;
      
  }
  .nav.navbar-nav.navbar-right li a .fa-facebook{
      font: 100;
      font-size: 15px;
      color: aliceblue;
  }
  
  .nav.navbar-nav.navbar-right li a .fa-whatsapp{
      font: 100;
      font-size: 15px;
      color: aliceblue;
  }**/
  
  </style>
  
  
  <div class="container-fluid top">
      
                      <!-- Right Side Of Navbar -->
                      <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a  class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->u_name }}
                            </a>
  
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../../dashboard">User Dashboard</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
  
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                        </li>
                        @endguest
                    </ul>
    <p>
      <a style="color:#f1f1f1;" href="https://www.twitter.com/Amaslink1"><i class="fa fa-twitter"></i></a>
      <a href="https://api.whatsapp.com/send?phone=479471632" style="color:#f1f1f1;"><i class="fa fa-whatsapp" style="font-weight:300;padding-right:5px;"></i></a> 
      <a href="https://www.instagram.com/amaslink3" style="color:#f1f1f1;"><i class="fa fa-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCtr6z1xfyPLNSzzYUwMZCvQ" style="color:#f1f1f1;"><i class="fa fa-youtube-play"></i></a>
      <a href="https://www.facebook.com/amaslinkclassified" style="color:#f1f1f1;"><i class="fa fa-facebook"></i></a>
  <span class="float">
  <a target="blank"style="text-decoration:none; color:#f1f1f1;" href="mailto:amaslink@gmail.com?Subject=Hello Amaslink, I Have an Enquiry"><i class="fa fa-envelope-o" style="color:#f1f1f1;"></i>
  amaslink@gmail.com</a>
  <a target="blank" style="text-decoration:none; color:#f1f1f1;" href="tel:479471632"><i class="fa fa-phone" style="color:#f1f1f1;"></i>+479471632</a>
  </span>
  </p>
  </div><!---end div for container top---->
  
  <nav class="navbar navbar-default" id="navbar">
     
  <div class="container-fluid">
        <div class="navbar-header" style="border: none;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border: none;">
            <i class="fa fa-list"></i>                    
          </button>
          <a class="navbar-brand" id="logo" href="../../"><img src="{{URL::asset('img/AMAS.png')}}" alt="logo" class="img-responsive" style="border: none;"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar" style="border: none;">
          <ul class="nav navbar-nav navbar-right" style="border: none;">
            <li><a href="../../">Homepage</a></li>
            <li><a href="../../dashboard">Dashboard</a></li>
            <li><a href="../../chat">Inbox({{App\Models\Messages::where('receiver_id', auth()->user()->id)->where('status', 'unread')->count()}})</a></li>
            <li><a href="../../announcements">Announcements</a></li>
            <li><a href="../../communities">Forum</a></li>
            <li><a href="../../help">How To Post Ads</a></li>
            @auth
            <li><a href="./favorites">Favorites</a></li>
            @endauth
            <li><a href="../../contact">Contact</a></li>
            <li><a href="../../adintro" class="btn btn-info btn-sm">POST AD</a></li>            
            <p>
              <a style="color:#a71d1d;" href="https://www.twitter.com/Amaslink1"><i class="fa fa-twitter"></i></a>
              <a href="https://api.whatsapp.com/send?phone=479471632" style="color:#cc2e2e;"><i class="fa fa-whatsapp" style="font-weight:300;padding-right:5px;"></i></a> 
              <a href="https://www.instagram.com/amaslink3" style="color:#d33131;"><i class="fa fa-instagram"></i></a>
              <a href="https://www.youtube.com/channel/UCtr6z1xfyPLNSzzYUwMZCvQ" style="color:#aa1313;"><i class="fa fa-youtube-play"></i></a>
              <a href="https://www.facebook.com/amaslinkclassified" style="color:#9b1f1f;"><i class="fa fa-facebook"></i></a>

            </p>
          </ul>
        </div>
      </div>
    </nav>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
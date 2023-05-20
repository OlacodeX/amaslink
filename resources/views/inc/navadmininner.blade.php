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
    font-size: 15px;
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
        font-size: 12px;
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
        margin-bottom: 0;
    }
    nav.navbar.navbar-default{
      background: transparent;
      margin-bottom: 100px;
    }
    nav.navbar.navbar-default div.container-fluid{
      background: transparent;
      padding-bottom: 10px;
    }
    .nav.navbar-nav.navbar-right,
    .nav.navbar-nav{
        padding-top: 15px;
        padding-right: 10px;
        font-weight: bold;
        color: #2b2732;
      border: none;
    }
    .nav.navbar-nav li a{
        font-weight: bold;
        font-size: 15px;
        line-height: 1.5em;
        color: #b2000093;
        border: none;
    }
    .nav.navbar-nav li a:hover{
        font-weight: 900;
        font-size: 15px;
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
      height: 100px;
      padding-bottom: 50px;
      border: none;
    }

    a.navbar-brand{
      padding-top: 10px;
      padding-left: 60px;
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
    
    @media only screen and (max-width: 768px) {
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
      padding-left: 20px;
      border: none;
    }
    .nav.navbar-nav li a{
        font-weight: 500;
        font-size: 12px;
        line-height: 1.5em;
        color: #b2000093;
        border: none;
        padding-left: 50px;
    }
    ul.nav.navbar-nav li a:hover{
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

    .w3-sidebar{
      height: 0%;
      width: 0;
      position: fixed;
      z-index: 0;
      top: 0;
      left: 0;
      bottom: 0;
      background-color: #f1f1f1;
      overflow-x: hidden;
      transition: 0.5s;
    
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
                              {{ Auth::user()->name }}
                          </a>

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
        <ul class="nav navbar-nav" style="border: none;">
          <li><a href="../../">Home</a></li>
          <li class="nav-item">
            <a class="nav-link" href="../../superadmin">Dashboard</a>
          </li>
          <li><a href="../../announcements/create">Make Announcement</a></li>
          <li><i class="fa fa-users"></i><a href="../../subscribed_users">Subscribed Users</a></li>
          <li><i class="fa fa-rss"></i><a href="../../newsletter/create">Send Broadcast</a></li>
          <li><i class="fa fa-rss"></i><a href="../../custom_bc">Send Bulk Email</a></li>
          <li><a href="../../communities/create">Create Forum Topic</a></li>
          <li><a href="../../adminposts">My Posts</a></li>
          <li class="nav-item">
            <a class="nav-link" href="../../profile/{{Auth::user()->id}}/">My Profile</a>
          </li>
          <li><a href="../../blog">Blog</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="border: none;">
          <li><a href="../../blog/create" class="btn btn-info btn-sm">NEW POST</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
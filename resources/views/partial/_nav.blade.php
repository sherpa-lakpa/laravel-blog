<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
<div class="banner">
  <div class="container">
    <div class="header" style="padding: 1px;padding-top: 17px;">
      <div class="logo">
        <a href="/"><img src="{{ URL::to('/') }}/images/logo1.png" class="img-responsive" alt="" /></a>
      </div>
      <div class="header-right">
        <ul>
          <li><a href="#"><i class="fb"> </i></a></li>
          <li><a href="https://github.com/sherpalakpa18/" target="_blank"><img src="https://static.wixstatic.com/media/51a5bd_6e89080215274fd7975c23895800b7b1~mv2.png" width="30" height="30"></a></li>
        <li><!-- 
          <button class="btn btn-default btn-sm only_outline">Login</button>
          <span style="font-size:25px;color: white;"> | </span>  
          <button class="btn btn-default btn-sm only_outline">SignUp</button> -->
            @if( Auth::check() )
            <li class="dropdown">
            <style type="text/css">
              .dropdown-toggle{
                color: white;
              }
              .dropdown-menu li{
                color: white;
                width: 95%;
              }
            </style>
              <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-size: 20px;">
              Hello {{ Auth::user()->name }}              
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/admin">Admin Panel</a></li>
                <li role="presentation" class="divider"></li>
                <li>
                     <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                @else
                      <style>
                      .only_outline{
                        background:rgba(0,0,0,0);
                        color: white;
                        width: 100px;
                        height: 40px;
                        border-radius: 20px;
                        font-size: 16px;
                        margin-top: -10px;
                      }
                      .btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active, .open>.dropdown-toggle.btn-success {
                          color: #556a7f;
                          background-color: rgba(255,255,255,0.5);
                          border-color: #285e8e; /*set the color you want here*/
                      }
                      </style>
                  <a class="text-bold" href="{{ route('login')}}" data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in"><button class="btn btn-default btn-sm only_outline">Sign in</button></a>  
                  <span style="font-size:25px;color: white;">  | </span>  
                  <a class="text-bold" href="{{ route('register')}}" data-ga-click="(Logged out) Header, clicked Sign up, text:sign-up"><button class="btn btn-default btn-sm only_outline">Sign up</button></a>
           
                @endif
        </li>
          <div class="clearfix"></div>
        </ul>
      </div>
        <div class="clearfix"> </div>
      </div>
        <div class="head-nav">
          <span class="menu"> </span>
           <ul class="nav navbar-nav navbar-right">
            <li>
            <div class="search2">
              <form method="get" action="/search">
                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}" style="height: 13px;" name="data">
                <input type="submit" value="">
              </form>
            </div></li>
            </ul>
            <ul class="cl-effect-15">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('browse') ? "active" : "" }}"><a href="/browse">Browse</a></li>
            {{-- <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li> --}}
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
                <div class="clearfix"> </div>
            </ul>

        </div>

            <!-- script-for-nav -->
          <script>
            $( "span.menu" ).click(function() {
              $( ".head-nav ul" ).slideToggle(300, function() {
              // Animation complete.
              });
            });
          </script>
        <!-- script-for-nav -->            
  </div> 
</div>
<!-- 

    Default Bootstrap Navbar
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        Brand and toggle get grouped for better mobile display
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Laravel Blog</a>
        </div>

        Collect the nav links, forms, and other content for toggling
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('browse') ? "active" : "" }}"><a href="/browse">Browse</a></li>
            <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">Blog</a></li>
            <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">About</a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          @if( Auth::check() )
            <li class="dropdown">
              <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Hello {{ Auth::user()->name }}              
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('posts.index') }}">Posts</a></li>
                <li><a href="{{ route('categories.index') }}">Catrgories</a></li>
                <li><a href="{{ route('tags.index') }}">Tags</a></li>
                <li role="separator" class="divider"></li>
                <li>
                     <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </li>
                @else
                <div class="nav-margin">
                  <a class="text-bold" href="{{ route('login')}}" data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in">Sign in</a> or 
                  <a class="text-bold" href="{{ route('register')}}" data-ga-click="(Logged out) Header, clicked Sign up, text:sign-up">Sign up</a>
                </div>
                @endif
              </ul>
            </li>
          </ul>
        </div>
        /.navbar-collapse
      </div>
      /.container-fluid
    </nav> -->
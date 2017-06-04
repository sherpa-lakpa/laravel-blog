<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 { 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 { 
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">How?</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/browse">Browse</a></li>
        <li><a href="/login">Login</a></li>
        <li><a href="/register">SignUp</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">Want to Join How Community ?</h3>
  <img src="images/bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
  <h3>I'm an adventurer</h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What are we?</h3>
  <p>How Community is online blog platform for sharing different steps to install or solving any error related to any platforms. </p>
  <p>How to posts are added on every error on this community</p>
  <a href="#" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Where To Find Me?</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="images/birds1.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="images/birds2.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <img src="images/birds3.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p> 
</footer>

</body>
</html>



<!-- 
      <div class="row">
        <div class="col-md-12" style="background:transparent url('images/slide.jpg') no-repeat center center /cover; height: 450px;color: white;">

            <h1 style="text-align: center;">Join the Error blog!</h1>
            <p class="lead" style="padding-top:60px;width: 400px;text-align: center;">Thank you so much for visiting. This blog contains solution for the errors you may encounter. This is my test website built with Laravel.</p>
            <div>
            <p> Join us. it only takes a minute. </p>
            <p><a class="btn btn-primary btn-lg" href="/register" role="button">Sign Up</a></p>
              
            </div>
        </div>
      </div>
      end of header .row
      <div class="row">
        <div class="col-md-5">
          <h1>New Posts</h1>
          @foreach($posts as $post)

            <div class="post">
              <h3>{{ $post->title }}</h3>
              <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
              <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>

            <hr>
          @endforeach
        </div>

        <div class="col-md-4">
          <h1>Featured Posts</h1>
          @foreach($posts as $post)

            <div class="post">
              <h3>{{ $post->title }}</h3>
              <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
              <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
            </div>

            <hr>
          @endforeach
        </div>

        <div class="col-md-3">
          <h2>Do you know? (linux)</h2>
          <div class="well well-sm">How to Install VLC</div>
          <div class="well well-sm">How to Install Sublime</div>
          <div class="well well-sm">How to Install Python</div>
          <div class="well well-sm">How to Install Tuxguitar</div>
        </div>
      </div>
 -->
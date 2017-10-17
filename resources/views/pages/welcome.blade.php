<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>How?</title>
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

#search {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    
    -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;

    -webkit-transform: translate(0px, -100%) scale(0, 0);
  -moz-transform: translate(0px, -100%) scale(0, 0);
  -o-transform: translate(0px, -100%) scale(0, 0);
  -ms-transform: translate(0px, -100%) scale(0, 0);
  transform: translate(0px, -100%) scale(0, 0);
    
    opacity: 0;
}

#search.open {
    -webkit-transform: translate(0px, 0px) scale(1, 1);
    -moz-transform: translate(0px, 0px) scale(1, 1);
  -o-transform: translate(0px, 0px) scale(1, 1);
  -ms-transform: translate(0px, 0px) scale(1, 1);
  transform: translate(0px, 0px) scale(1, 1); 
    opacity: 1;
}

#search input[type="search"] {
    position: absolute;
    top: 50%;
    width: 100%;
    color: rgb(255, 255, 255);
    background: rgba(0, 0, 0, 0);
    font-size: 60px;
    font-weight: 300;
    text-align: center;
    border: 0px;
    margin: 0px auto;
    margin-top: -51px;
    padding-left: 30px;
    padding-right: 30px;
    outline: none;
}
#search .btn {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: 61px;
    margin-left: -45px;
}
#search .close {
    position: fixed;
    top: 15px;
    right: 15px;
    color: #fff;
  background-color: #428bca;
  border-color: #357ebd;
  opacity: 1;
  padding: 10px 17px;
  font-size: 27px;
}
  </style>
<script type="text/javascript">
  $(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    
    // //Do not include! This prevents the form from submitting for DEMO purposes only!
    // $('form').submit(function(event) {
    //     event.preventDefault();
    //     return false;
    // })
});
</script>
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
  <a href="/register"><img src="images/bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350"></a>
    <h5><a href="#search" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> Search
    </a>
    </h5>
  <h3>We are a contributers.</h3>
</div>
<div id="search">
    <button type="button" class="close">×</button>
    <form method="get" action="/search">
        <input type="search" value="" placeholder="type keyword(s) here" name="data" />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What are we?</h3>
  <p>How Community is online blog platform for sharing different steps to install or solving particular error related to any platforms. </p>
  <p>How? posts are added on every error on the blog.</p>
  <a href="/browse" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-eye-open"></span> Browse
  </a>
</div>

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
  <h3 class="margin">Why How? <br>(<small>In small step</small>)</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <p>Newbie search for solving errors and installation setups through out the internet.</p>
      <img src="images/step1.jpg" class="img-responsive margin" style="width:80%" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>They try many steps and different solution searching various sites.</p>
      <img src="images/step2.jpg" class="img-responsive margin" style="width:100%;margin-left: 1px;" alt="Image">
    </div>
    <div class="col-sm-4"> 
      <p>Get to know about How? blog and solve their solution. And even join our community to contribute other Newbies.</p>
      <img src="images/step3.jpg" class="img-responsive margin" style="width:80%" alt="Image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Thanks for theme to - <a href="https://www.w3schools.com">www.w3schools.com</a></p> 
</footer>

</body>
</html>

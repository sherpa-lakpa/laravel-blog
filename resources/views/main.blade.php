<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partial._head')
    
  </head>
<body>
  @include('partial._nav')

  <div class="container">
  
    @include('partial._messege')

    @yield('content')

    @include('partial._footer')

  </div>  <!-- end of .container -->

  @include('partial._javascripts')

  @yield('scripts')

</body>

</html>

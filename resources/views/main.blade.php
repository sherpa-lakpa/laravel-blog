<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partial._head')
    
  </head>
<body>
  @include('partial._nav')
  
    @include('partial._messege')

    @yield('content')



  @include('partial._footer')
  @include('partial._javascripts')

  @yield('scripts')

</body>
</html>

@extends('main')

@section('title',"| Posts")

@section('content')
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="../../css/main.css">       
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<script src="../../js/jquery.min.js"></script>


<!---//End-header---->
        <!---start-content---->
        <div class="content">
            <div class="wrap" style="margin-top: -100px;">
             <div id="main" role="main">
                  <ul id="tiles">
                    <!-- These are our grid blocks -->
                  @foreach($posts as $post)
                  <li onclick="location.href='{{ url('blog/'.$post->slug) }}';">
                      <img src="{{ asset('images/' . $post->image) }}" width="282" height="200">
                      <div class="post-info">
                          <div class="post-basic-info">
                              <h3><a href="{{ url('blog/'.$post->slug) }}">{{ $post->title }}</a></h3>
                              <span><a href="#"><label> </label>Movies</a></span>
                              <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ..." : "" }}</p>
                          </div>
                          <div class="post-info-rate-share">
                              <div class="rateit">
                                  <span> </span>
                              </div>
                              <div class="post-share">
                                  <span> </span>
                              </div>
                              <div class="clear"> </div>
                          </div>
                      </div>
                  </li>
                  @endforeach
                  </ul>
                </div>
            </div>
        </div>
        <!---//End-content-->
        <!--wookmark-scripts-->
          <script src="../../js/jquery.imagesloaded.js"></script>
          <script src="../../js/jquery.wookmark.js"></script>
          <script type="text/javascript">
            (function ($){
              var $tiles = $('#tiles'),
                  $handler = $('li', $tiles),
                  $main = $('#main'),
                  $window = $(window),
                  $document = $(document),
                  options = {
                    autoResize: true, // This will auto-update the layout when the browser window is resized.
                    container: $main, // Optional, used for some extra CSS styling
                    offset: 20, // Optional, the distance between grid items
                    itemWidth:280 // Optional, the width of a grid item
                  };
              /**
               * Reinitializes the wookmark handler after all images have loaded
               */
              function applyLayout() {
                $tiles.imagesLoaded(function() {
                  // Destroy the old handler
                  if ($handler.wookmarkInstance) {
                    $handler.wookmarkInstance.clear();
                  }
        
                  // Create a new layout handler.
                  $handler = $('li', $tiles);
                  $handler.wookmark(options);
                });
              }
              /**
               * When scrolled all the way to the bottom, add more tiles
               */
              function onScroll() {
                // Check if we're within 100 pixels of the bottom edge of the broser window.
                var winHeight = window.innerHeight ? window.innerHeight : $window.height(), // iphone fix
                    closeToBottom = ($window.scrollTop() + winHeight > $document.height() - 100);
        
                if (closeToBottom) {
                  // Get the first then items from the grid, clone them, and add them to the bottom of the grid
                  var $items = $('li', $tiles),
                      $firstTen = $items.slice(0, 10);
                  $tiles.append($firstTen.clone());
        
                  applyLayout();
                }
              };
        
              // Call the layout function for the first time
              applyLayout();
        
              // Capture scroll event.
              $window.bind('scroll.wookmark', onScroll);
            })(jQuery);
          </script>
        <!--//wookmark-scripts-->
        <!--start-footer-->
        <div class="footer">
            <p>Design by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
        <!--//End-footer-->
        <!--//End-wrap-->
@endsection
@section('scripts')


<script src="../../js/jquery.min.js"></script>

@endsection

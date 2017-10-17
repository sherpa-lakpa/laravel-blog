@extends('main')

@section('title',"| Posts")

        <link href="css/style1.css" rel='stylesheet' type='text/css' />     
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
        <!-- webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//webfonts  -->
        <!-- Global CSS for the page and tiles -->
        <link rel="stylesheet" href="css/main.css">
        <script src="js/jquery.min.js"></script>
        <!-- //Global CSS for the page and tiles -->
        <!---start-click-drop-down-menu -->

@section('content')

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

                  {{--   <li onclick="location.href='single-page.html';">
                        <img src="images1/img1.jpg" width="282" height="118">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img2.jpg" width="282" height="344">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img3.jpg" width="282" height="210">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img4.jpg" width="282" height="385">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <!---//-->
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img4.jpg" width="282" height="385">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img3.jpg" width="282" height="210">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img2.jpg" width="282" height="344">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                      <li onclick="location.href='single-page.html';">
                        <img src="images1/img1.jpg" width="282" height="118">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <!----//-->
                     <li onclick="location.href='single-page.html';">
                        <img src="images1/img1.jpg" width="282" height="118">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img2.jpg" width="282" height="344">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img3.jpg" width="282" height="210">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    <li onclick="location.href='single-page.html';">
                        <img src="images1/img4.jpg" width="282" height="385">
                        <div class="post-info">
                            <div class="post-basic-info">
                                <h3><a href="#">Animation films</a></h3>
                                <span><a href="#"><label> </label>Movies</a></span>
                                <p>Lorem Ipsum is simply dummy text of the printing & typesetting industry.</p>
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
                    </li> --}}
                    
                    <!-- End of grid blocks -->
                  </ul>
                </div>
            </div>
        </div>
        <!---//End-content-->
        <!--wookmark-scripts-->
          <script src="js/jquery.imagesloaded.js"></script>
          <script src="js/jquery.wookmark.js"></script>
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


<!-- 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <hr>
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

            <p>{{ substr($post->body, 0,100) }}{{ strlen($post->body) > 100 ? "...." : "" }}</p>

            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-md">Read more</a>

        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div> -->
@endsection
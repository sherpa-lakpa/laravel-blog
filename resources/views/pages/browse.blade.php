@extends('main')

@section('title', '| Home')


@section('content')
<!-- content -->
<div class="content">
  <div class="container">
   <div class="load_more"> 
           <ul id="myList">
           <li>
            <div class="l_g">
              <!-- These are our grid blocks -->
              <?php $x = 0; ?>
               @foreach($posts as $post)
               <?php $x = $x+1; ?>
                @if ($x == 3)
                  <div class="col-md-3 integ">
                     <div class="l_g_r">
                       <div class="dapibus">
                         <h2>{{ $post->title }}</h2>
                         <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                         <a href="details.html"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
                         <p>{{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                         <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                       </div>
                     </div>
                  </div>
                  
                    <div class="col-md-3 integ">
                      <div class="l_g_r">
                        <div class="posts">
                          <h4>Recent posts</h4>
                          <h6><a href="#">Aliquam tincidunt mauris</a></h6>
                          <h6><a href="#">Vestibulum auctor lipsum</a></h6>
                          <h6><a href="#">Nunc dignissim risus</a></h6>
                          <h6><a href="#">Cras ornare tristiqu</a></h6>
                        </div>
                        <div class="comments">
                          <h4>Recent Comments</h4>
                          <h6><a href="#">Amada Doe <span>on</span> Hello World!</a></h6>
                          <h6><a href="#">Peter Doe <span>on</span> Photography</a></h6>
                          <h6><a href="#">Steve Roberts <span>on</span> HTML5/CSS3</a></h6>
                          <h6><a href="#">Doe Peter<span>on</span> Photography</a></h6>
                        </div>
                        <div class="archievs">
                          <h4>Archives</h4>
                          <h6><a href="#">October 2013</a></h6>
                          <h6><a href="#">September 2013</a></h6>
                          <h6><a href="#">August 2013</a></h6>
                          <h6><a href="#">July 2013</a></h6>
                        </div>

                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                    <div class="l_g">
                @elseif ($x == 6)
                 <div class="col-md-3 praesent">
                     <div class="l_g_r">
                       <div class="dapibus">
                         <h2>{{ $post->title }}</h2>
                         <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                         <a href="details.html"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
                         <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                         <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                       </div>
                     </div>
                  </div>
                  <div class="col-md-3 integ">
                    <div class="l_g_r">
                      <div class="categories">
                        <h4>Categories</h4>
                        <h6><a href="#">Vivamus vestibulum nulla</a></h6>
                        <h6><a href="#">Integer vitae libero ac risus e</a></h6>
                        <h6><a href="#">Vestibulum commo</a></h6>
                        <h6><a href="#">Cras iaculis ultricies</a></h6>
                      </div>
                    </div>
                  </div>
                    <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                    <div class="l_g">
                @else

                  @if ($x%3 === 0)
                    <div class="col-md-3 praesent">
                       <div class="l_g_r">
                         <div class="dapibus">
                           <h2>{{ $post->title }}</h2>
                           <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                           <a href="details.html"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
                           <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                           <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                         </div>
                       </div>
                    </div>
                    <div class="col-md-3 integ">
                      <div class="l_g_r">
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="l_g">
                  @else
                    <div class="col-md-3 praesent">
                       <div class="l_g_r">
                         <div class="dapibus">
                           <h2>{{ $post->title }}</h2>
                           <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                           <a href="details.html"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 180px;"></a>
                           <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                           <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                         </div>
                       </div>
                    </div>
                  @endif
                @endif  
                @endforeach

           {{--  <li>
            <div class="l_g">
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h2>Praesent dapibusneque id cursus faucioibus tortor neque tiegetas augue</h2>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img1.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="integer">
                    <h3>Integer vitae libero ac risus egestas</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img3.jpg" class="img-responsive" alt=""></a>
                    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel ipsum dolor.</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h3>Integer vitae libero risus egestas</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/2222.jpg" class="img-responsive" alt=""></a>
                    <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilis</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="posts">
                    <h4>Recent posts</h4>
                    <h6><a href="#">Aliquam tincidunt mauris</a></h6>
                    <h6><a href="#">Vestibulum auctor lipsum</a></h6>
                    <h6><a href="#">Nunc dignissim risus</a></h6>
                    <h6><a href="#">Cras ornare tristiqu</a></h6>
                  </div>
                  <div class="comments">
                    <h4>Recent Comments</h4>
                    <h6><a href="#">Amada Doe <span>on</span> Hello World!</a></h6>
                    <h6><a href="#">Peter Doe <span>on</span> Photography</a></h6>
                    <h6><a href="#">Steve Roberts <span>on</span> HTML5/CSS3</a></h6>
                    <h6><a href="#">Doe Peter<span>on</span> Photography</a></h6>
                  </div>
                  <div class="archievs">
                    <h4>Archives</h4>
                    <h6><a href="#">October 2013</a></h6>
                    <h6><a href="#">September 2013</a></h6>
                    <h6><a href="#">August 2013</a></h6>
                    <h6><a href="#">July 2013</a></h6>
                  </div>

                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li>
            <div class="l_g">
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h3>CURSUS FAUCIO</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img2.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="integer">
                    <h3>Aliquam tincidunt mauris eu risus</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="lorem">
                    <h3>Lorem ipsum dolor</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <iframe src="//player.vimeo.com/video/78517603" width="220px" height="" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                    <p>Pellentesque odio nisi, euismod in, pharetra a, ultricies in.</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="categories">
                    <h4>Categories</h4>
                    <h6><a href="#">Vivamus vestibulum nulla</a></h6>
                    <h6><a href="#">Integer vitae libero ac risus e</a></h6>
                    <h6><a href="#">Vestibulum commo</a></h6>
                    <h6><a href="#">Cras iaculis ultricies</a></h6>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li>
            <div class="l_g">
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h2>Praesent dapibusneque id cursus faucioibus tortor neque tiegetas augue</h2>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img10.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="vitae">
                    <h3>Integer vitae libero risus egestas</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img4.jpg" class="img-responsive" alt=""></a>
                    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>

                </div>
              </div>
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="integer">
                    <h3>Praesent dapibusn id cursus</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img11.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li>
            <div class="l_g">
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h2>Praesent dapibusneque id cursus faucioibus tortor neque tiegetas augue</h2>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img13.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="vitae">
                    <h3>Integer vitae libero risus egestas</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img14.jpg" class="img-responsive" alt=""></a>
                    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>

                </div>
              </div>
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="integer">
                    <h3>Praesent dapibusn id cursus</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img15.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </li>
          <li>
            <div class="l_g">
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="dapibus">
                    <h2>Praesent dapibusneque id cursus faucioibus tortor neque tiegetas augue</h2>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img16.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                  <div class="vitae">
                    <h3>Integer vitae libero risus egestas</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img17.jpg" class="img-responsive" alt=""></a>
                    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet</p>
                    <a href="details.html" class="link">Read More</a>
                  </div>

                </div>
              </div>
              <div class="col-md-3 praesent">
                <div class="l_g_r">
                  <div class="integer">
                    <h3>Praesent dapibusn id cursus</h3>
                    <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                    <a href="details.html"><img src="images/img5.jpg" class="img-responsive" alt=""></a>
                    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate. </p>
                    <a href="details.html" class="link">Read More</a>
                  </div>
                </div>
              </div>
              <div class="col-md-3 integ">
                <div class="l_g_r">
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </li> --}}
          <div class="clearfix"></div>
        </ul>
      <div id="loadMore">Load more</div>
      <div id="showLess">Show less</div>
      <script>
        $(document).ready(function () {
            size_li = $("#myList li").size();
            x=3;
            $('#myList li:lt('+x+')').show();
            $('#loadMore').click(function () {
                x= (x+1 <= size_li) ? x+1 : size_li;
                $('#myList li:lt('+x+')').show();
            });
            $('#showLess').click(function () {
                x=(x-1<0) ? 1 : x-1;
                $('#myList li').not(':lt('+x+')').hide();
            });
        });
      </script>
    </div>

      <!-- end of header .row -->
   <!--    <div class="row">
     <div class="col-md-8">
     @foreach($posts as $post)
   
       <div class="post">
         <h3>{{ $post->title }}</h3>
         <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
         <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
       </div>
   
       <hr>
     @endforeach
     </div>
   
     <div class="col-md-3 col-md-offset-1">
       <h2>Sidebar</h2>
     </div>
   </div> -->
</div>
</div>
@endsection


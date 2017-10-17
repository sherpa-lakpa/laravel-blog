@extends('main')

@section('title', '| Browse')

@section('content')
<!-- content -->
<div class="content">
  <div class="container">
   <div class="load_more"> 
           <ul id="myList">
           <li>
            <div class="l_g">
              <!-- These are our grid blocks -->
              <?php 
                $x = 0; 
                $top_page = $posts;
              ?>
              <style type="text/css">
                .gap{
                  margin-top: 5px;
                }
              </style>
               @foreach($posts as $post)
               <?php $x = $x+1; ?>
                @if ($x == 3)
                  <div class="col-md-3 integ gap">
                     <div class="l_g_r">
                       <div class="dapibus">
                         <a href="{{ url('blog/'.$post->slug) }}"><h2>{{ $post->title }}</h2></a>
                         <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                         <a href="{{ url('blog/'.$post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
                         <p>{{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                         <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                       </div>
                     </div>
                  </div>
                  
                    <div class="col-md-3 integ gap">
                      <div class="l_g_r">
                        <div class="posts">
                          <h4>Recent posts</h4>
                          <?php $z = 0; ?>
                          @foreach($top_page as $tpage)
                            <h6><a href="{{ url('blog/'.$tpage->slug) }}">{{ $tpage->title }}</a></h6>
                            <?php 
                            $z = $z + 1;
                            if($z == 6){
                              break;
                            }
                            ?>
                          @endforeach
                        </div>
                        <div class="comments">
                          <h4>Recent Comments</h4>
                          @foreach($comments as $comment)
                            <h6><a href="/blog/{{ $comment->post["slug"] }}"> {{ substr(strip_tags($comment->comment), 0, 15) }}{{ strlen(strip_tags($comment->comment)) > 15 ? "..." : "" }} <span><b>on</b></span><b> {{ $comment->post["title"] }} </b></a></h6>
                          @endforeach
                        </div>

                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </li>
                <li>
                    <div class="l_g">
                @elseif ($x == 6)
                 <div class="col-md-3 praesent gap">
                     <div class="l_g_r">
                       <div class="dapibus">
                        <a href="{{ url('blog/'.$post->slug) }}"> <h2>{{ $post->title }}</h2></a>
                         <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                         <a href="{{ url('blog/'.$post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
                         <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                         <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                       </div>
                     </div>
                  </div>
                  <div class="col-md-3 integ gap">
                    <div class="l_g_r">
                      <div class="categories">
                        <h4>Categories</h4>
                        @foreach($categories as $category)
                        <h6><a href="/blog/category/{{ $category->name }}">{{ $category->name }}</a></h6>
                        @endforeach
                        <h6><a href="/blog">All</a></h6>
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
                    <div class="col-md-3 praesent gap">
                       <div class="l_g_r">
                         <div class="dapibus">
                          <a href="{{ url('blog/'.$post->slug) }}"> <h2>{{ $post->title }}</h2></a>
                           <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                           <a href="{{ url('blog/'.$post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 200px;"></a>
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
                    <div class="col-md-3 praesent gap">
                       <div class="l_g_r">
                         <div class="dapibus">
                          <a href="{{ url('blog/'.$post->slug) }}"> <h2>{{ $post->title }}</h2></a>
                           <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                           <a href="{{ url('blog/'.$post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 180px;"></a>
                           <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                           <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                         </div>
                       </div>
                    </div>
                  @endif
                @endif  
                @endforeach
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


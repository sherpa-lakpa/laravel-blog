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
              <?php 
                $x = 0; 
                $top_page = $posts;
              ?>

               @foreach($posts as $post)
               <?php $x = $x+1; ?>
                    <div class="col-md-3 praesent" style="margin-bottom:10px;">
                       <div class="l_g_r">
                         <div class="dapibus">
                           <h2>{{ $post->title }}</h2>
                           <p class="adm">Posted by <a href="#">Admin</a>  |  7 days ago</p>
                           <a href="{{ url('blog/'.$post->slug) }}"><img src="{{ asset('images/' . $post->image) }}" class="img-responsive" alt="" style="height: 180px;"></a>
                           <p>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? " ....." : "" }}</p>
                           <a href="{{ url('blog/'.$post->slug) }}" class="link">Read More</a>
                         </div>
                       </div>
                    </div>
                    
                    <div class="l_g">
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


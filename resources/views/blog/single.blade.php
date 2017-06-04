@extends('main')

@section('title',"| $post->title")

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<div class="content">
    <div class="wrap">
        <div class="single-page">
            <div class="single-page-artical">
                <div class="artical-content">
                    <img src="{{ asset('images/' . $post->image) }}" title="banner1">
                    <h3><a href="#">{{  $post->title    }}</a></h3>
                    <p>{!!    $post->body !!}</p> <p class="para1"></p> <p class="para2"></p> 
                </div>
                <div class="artical-links">
                    <ul>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/blog-icon2.png" title="Admin"><span>{{ $post->category->name }}</span></a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/blog-icon3.png" title="Comments"><span>No comments</span></a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/blog-icon4.png" title="Lables"><span>View posts</span></a></li>
                    </ul>
                </div>
                <div class="share-artical">
                    <ul>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/facebooks.png" title="facebook">Facebook</a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/twiter.png" title="Twitter">Twiiter</a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/google.png" title="google+">Google+</a></li>
                        <li><a href="#"><img src="{{ URL::to('/') }}/images/rss.png" title="rss">Rss</a></li>
                    </ul>
                </div>
                <div class="clear"> </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="commnet-title"><span class="glyphicon glyphicon-comment"> </span> {{ $comments->count() }} Comments:</h3>
               
                 </div>
            </div>             
            <!---start-comments-section-->
            <div class="comment-section">
                <div class="grids_of_2">
                    <h2>Comments</h2>
                    @foreach($comments as $comment)
                        <div class="grid1_of_2">
                            <div class="grid_img">
                                <a href=""><img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)))."?d=wavatar" }}" alt="" style="border-radius: 100%;"></a>
                            </div>
                            <div class="grid_text">
                                <h4 class="style1 list"><a href="#">{{ $comment->name }}</a></h4>
                                <p class="style">{{ date('F j, Y - g:i',strtotime($comment->created_at)) }}</p>
                                <p class="para top"> {{ $comment->comment }}</p>
                                <a href="" class="btn1">Click to Reply</a>
                            </div>
                            <div class="clear"></div>
                        </div>

                    @endforeach
             <!--    
                                         <div class="grid1_of_2 left">
                                             <div class="grid_img">
                                                 <a href=""><img src="images/pic10.jpg" alt=""></a>
                                             </div>
                                             <div class="grid_text">
                                                 <h4 class="style1 list"><a href="#">Designer First</a></h4>
                                                 <h3 class="style">march 3, 2013 - 4.00 PM</h3>
                                                 <p class="para top"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                                                 <a href="" class="btn1">Click to Reply</a>
                                             </div>
                                             <div class="clear"></div>
                                         </div>  -->                            
                    <div class="artical-commentbox">
                        <h2>Leave a Comment</h2>
                        <div class="table-form">
                            {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
                            {{ Form::label('name', "Name:") }}
                            {{ Form::text('name', null, []) }}
                            {{ Form::label('email', "Email: ") }}
                            {{ Form::text('email', null, []) }}
                            {{ Form::label('comment', "Comment: ") }}
                            {{ Form::textarea('comment', null, ['rows' => '5']) }}

                            {{ Form::submit('submit', []) }}
                                
                        </div>
                        <div class="clear"> </div>
                    </div>          
                </div>
            </div>
            <!--//End-comments-section-->
        </div>
    </div>
</div>

@endsection
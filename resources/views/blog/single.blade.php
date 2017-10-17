@extends('main')

@section('title',"| $post->title")

@section('stylesheet')
<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

@endsection

@section('content')

      <!-- header -->
<div class="about">

<div class="container-fluid" >
<div class="col-md-1"></div>
<div class="biography col-md-8">
    <div class="biographys" >
        <div class="container" >
            <div class="row">
                <div class="col-md-8">
                    <style type="text/css">
                    .only_outlines{
                            background:rgba(0,0,0,0);
                            color: black;
                            border-radius: 20px;
                            font-size: 16px;
                            margin-top: 0px;
                          }
                    </style>
                    <!-- the actual blog post: title/author/date/content -->
                    <h1>{{ $post->title }}</h1>
                    <p class="lead"><i class="fa fa-user"></i> by <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-md only_outlines">{{ $post->user["name"] }}</a>
                    <hr>
                    <p><i class="fa fa-calendar"></i> Posted on {{ $post->created_at }}
                    &nbsp;&nbsp;&nbsp; <i class="fa fa-tags"></i> Tags: 
                    @foreach($post->tags as $tag)
                    <a href=""><span class="badge badge-info">{{ $tag->name }}</span></a>
                    @endforeach
                    <hr>
                    <div class="paragraphs">
                        <div class="row">
                            <div class="span4">
                            {{-- <center>
                            <div style="height: 200px">
                                <img src="{{ asset('images/' . $post->image) }}"
                                style="max-height: 100%; max-width: 100%">
                            </div>
                            </center> --}}
                              <p style="clear:both">{!! $post->body !!}</p>
                            </div>
                        </div>
                    </div>{{-- 
                    <img src="{{ asset('images/' . $post->image) }}" height="200" width="300">
                    <p class="lead">{!! $post->body !!}</p>
                    --}}                <br/>
                    <!-- Place this tag in your head or just before your close body tag. -->

                    <br/>

                    <p><h4>I like the post? Like this!</h4></p>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

                    <div class="g-plusone" data-annotation="inline" data-width="300" data-href=""></div>

                    <!-- Helyezd el ezt a címkét az utolsó +1 gomb címke mögé. -->
                    <script type="text/javascript">
                    (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/platform.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                    </script>
                    <br/>
                    <div class="clearfix"> </div>
                </div>
                </div>
                </div>


            </div>

                      </div>
    <div class="col-md-3" style="margin-top:10px;" >
      <div class="biographys" style="padding: 0px;background:transparent;" >

        <!-- /well -->
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-fire"></i> Popular Posts:</h4></div>
            <div class="panel-body">
                <ul>
                <?php $z = 0; ?>
                @foreach($posts as $tpage)
                    <li><a href="{{ url('blog/'.$tpage->slug) }}">{{ $tpage->title }}</a></li>
                    <?php 
                    $z = $z + 1;
                    if($z == 6){
                      break;
                    }
                    ?>
                @endforeach
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-tags"></i> Popular Category:</h4></div>
            <div class="panel-body">
                <div class="row">
                <?php $i = 0; ?>
                @foreach($categories as $category)       
                <?php  $i++; ?>
                @if($i < 4)
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="/blog/category/{{ $category->name }}"><span class="badge badge-info">{{ $category->name }}</span></a>
                        </li>
                    </ul>
                </div>
                @elseif($i < 8)
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><a href="/blog/category/{{ $category->name }}"><span class="badge badge-info">{{ $category->name }}</span></a>
                        </li>
                    </ul>
                </div>
                @else

                @endif

                @endforeach
            </div>
            </div>
        </div>

        </div>
    </div>

    </div>

<!-- the comment box -->
<div class="container-fluid">
<div class="row">
<div class="col-md-1"></div>
<div class="biography col-md-10"  style="margin-left:10px;">
    <div class="row col-md-10">
    <div class="well col-md-11">
        <h4><i class="fa fa-paper-plane-o"></i> Leave a Comment:</h4>

        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
            @if(Auth::check())
                {{ Form::hidden('name', Auth::user()->name, ['class' => '']) }}
                {{ Form::hidden('email', Auth::user()->email, ['class' => '']) }}
            @else
                {{ Form::label('name', "Name:") }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                {{ Form::label('email', "Email: ") }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            @endif

                {{ Form::label('comment', "Comment: ") }}
                {{ Form::textarea('comment', null, ['rows' => '5','class' => 'form-control']) }}

                {{ Form::submit('Comment', ['class' => 'btn btn-default']) }}
        {!! Form::close() !!}
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-1" style=""></div>
<div class="biography col-md-10"  style="margin-left:10px;">

    <div class="row">
        <div class="col-sm-8">
            <div class="alert-message"></div>
        </div>
        @foreach($post->comments as $comment)
            <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                
               {!! Form::open(['route' => ['blog.comment_destory', $comment->id],'method' => 'DELETE']) !!}

               @if(Auth::check())
                   @if(Auth::user()->email == $post->user->email || Auth::user()->email == $comment->email || Auth::user()->admin)
                        {!! Form::submit('X', ['class' =>  'btn btn-danger btn-sm pull-right']) !!}
                   @endif
                @endif
                   
               {!! Form::close() !!}
                    <div class="pull-left image">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)))."?d=wavatar" }}" class="img-circle avatar" alt=" {{ $comment->name }}">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b>{{ $comment->name }}</b></a>
                        </div>
                        <h6 class="text-muted time">{{ date('F j, Y - g:i',strtotime($comment->created_at)) }}</h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p>{{ $comment->comment }}</p>
                   <!--  <div class="stats">
                       <a href="#" class="btn btn-default stat-item">
                           <i class="fa fa-thumbs-up icon"></i>2
                       </a>
                       <a href="#" class="btn btn-default stat-item">
                           <i class="fa fa-thumbs-down icon"></i>12
                       </a>
                   </div> -->
                </div>
            </div>
        </div>
        @endforeach          
    </div>
</div>
</div>
</div>
</div>

@endsection
<style type="text/css">
.alert
{
position: relative;
z-index: 10;
padding-left: 250px;
font-size: 14px;
}
</style>

@section('scripts')

<script src="../js/jquery.min.js"></script>

<script type="text/javascript">

@if(Session::has('Comment_success'))
$(function()
{

    var type = 'success';
    var message = '<?php echo Session::get('Comment_success'); ?>';

    var alertType = 'alert-'+ type
    
   // alert('alert type is: '+ alertType);
    
    var htmlAlert = '<div class="alert '+ alertType +'"><p>'+ message +'</p></div>';
    
   // alert(htmlAlert);
    
    $(".alert-message").prepend(htmlAlert);
    
    $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });

});
@endif

</script>

<?php
    $splitName = explode(' ', $post->user["name"], 2); // Restricts it to only 2 values, for names like Billy Bob Jones
    $first_name = $splitName[0];
    $last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty
 ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title" id="myModalLabel">More About {{ $first_name }}</h4>
        </div>
        <div class="modal-body">
            <center>
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($post->user["email"])))."?d=wavatar" }}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
            <h3 class="media-heading">{{ $post->user["name"] }}</h3>
            <span><strong>Skills: </strong></span>
                @foreach($post->user['skills'] as $skill)
                    <span class="label label-warning">{{ $skill->name }}</span>
                @endforeach
            </center>
            <hr>
            <center>
            <p class="text-left"><strong>Bio: </strong><br>
                {{ $post->user["bio"] }}</p>
            <br>
            </center>
        </div>
        <div class="modal-footer">
            <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough!! {{ $last_name }}</button>
            </center>
        </div>
    </div>
</div>
@endsection
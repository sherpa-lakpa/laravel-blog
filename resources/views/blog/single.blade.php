@extends('main')

@section('title',"| $post->title")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<img src="{{ asset('images/' . $post->image) }}" height="200" width="400">
			<h1>{{	$post->title	}}</h1>
			
			<p class="lead"> {!!	$post->body	!!}</p>
		<hr>
			<p>Posted In: {{ $post->category->name }}</p>
			</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="commnet-title"><span class="glyphicon glyphicon-comment"> </span> {{ $comments->count() }} Comments:</h3>
			@foreach($comments as $comment)
				<div class="comment">
					<div class="author-info">
					<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)))."?d=wavatar" }}" class="author-image">
					<div class="author-name">
						<h4>{{ $comment->name }}</h4>
						<p class="author-time">{{ date('F j, Y - g:i',strtotime($comment->created_at)) }}</p>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}

					</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', "Name: ") }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', "Email: ") }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-12">
					{{ Form::label('comment', "Comment: ") }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

					{{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block']) }}
				</div>
			</div>
		</div>
	</div>

@endsection
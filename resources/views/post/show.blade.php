@extends('main')

@section('title','| View Post')

@section('content')
<div class="row">
	<div class="col-md-8"  style="word-wrap: break-word">
		<h1>{{	$post->title	}}</h1>
		
		<img src="{{ asset('images/' . $post->image) }}" height="200" width="400" alt="This is lakpa bodyguard">
		<p class="lead"> {!! $post->body !!}</p>
		<hr>
		<div class="tags">
		@foreach($post->tags as $tag)
		<span class="label label-default">
			{{ $tag->name }}
		</span>
		@endforeach
		</div>
		<div class="backend-comments">
			<h3>Comments <small>{{ $post->comments()->count() }}</small></h3>

			<table class="table">
				<thead>
					<tr>
						<td>Name</td>
						<td>Email</td>
						<td>Comment</td>
						<td width="70px"></td>
					</tr>
				</thead>
				<tbody>
					
					@foreach($post->comments as $comment)
					<tr>
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email }}</td>
						<td>{{ $comment->comment }}</td>
						<td>
							<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>

	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<label>URL:</label>
				<p><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/'.$post->slug) }}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<label>Category:</label>
				<p>{{ $post->category->name }}</p>
			</dl>
			<dl class="dl-horizontal">
				<label>Created At:</label>
				<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
			</dl>
			<dl class="dl-horizontal">
				<label>Last Updated:</label>
				<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class' =>  'btn btn-danger btn-block']) !!}

					{!! Form::close() !!}
				</div>

			</div>
		</div>
		<a href="{{ route('posts.index') }}" class="btn btn-success btn-block">Show all post</a>
	</div>
</div>
@endsection
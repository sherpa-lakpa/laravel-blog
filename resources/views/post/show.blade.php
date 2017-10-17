@extends('admins.main')

@section('title','| View Post')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		{{ $post->title }}
		</h1>
	</div>
</div>
<!-- /.row -->

<div class="row">
	<div class="col-md-8"  style="word-wrap: break-word">
		
		<img src="{{ asset('images/' . $post->image) }}" height="200" width="350" class="img-thumbnail pull-right">
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
				<a href="@if(Auth::user()->id == $post->user_id || Auth::user()->admin)
								{{ route('posts.edit', $post->id) }}
								@else
								{{ "javascript:;" }}
								@endif" class="btn btn-primary btn-block" {{ Auth::user()->id == $post->user_id || Auth::user()->admin ? "" : "disabled" }}>Edit</a>
					
				</div>
				@if(Auth::user()->id == $post->user_id || Auth::user()->admin)

				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class' =>  'btn btn-danger btn-block']) !!}
				</div>
				@else
				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class' =>  'btn btn-danger btn-block','disabled' => 'disabled','id' => 'mySubmit']) !!}
				</div>
					<script type="text/javascript">
							document.getElementById("mySubmit").disabled = true;
					</script>	
				{!! Form::close() !!}
				@endif

			</div>
		</div>
		<a href="{{ route('posts.index') }}" class="btn btn-success btn-block">Show all post</a>
	</div>
</div>
@endsection

@section('scripts')

<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>

@endsection

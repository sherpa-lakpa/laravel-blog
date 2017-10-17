@extends('admins.main')

@section('title', "| $tag->name")

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

<<<<<<< HEAD
<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


=======
>>>>>>> 688a4c38d431c09417f4125d56b10ec7c461a232
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
	<h1>{{ $tag->name }} - <small>Posts ({{ $tag->posts()->count() }})</small></h1>
	</div>
	<div class="col-md-2">
		<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block pull-right">Edit</a>
	</div>
	<div class="col-md-2">
	{!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
	{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}

	{{ Form::close() }}
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($tag->posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@section('scripts')

<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>

@endsection

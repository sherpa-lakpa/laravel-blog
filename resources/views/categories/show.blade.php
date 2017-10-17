@extends('admins.main')

@section('title', "| $category->name")

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
<div class="row">
	<div class="col-md-8">
	<h1>{{ $category->name }} - <small>Posts ({{ $category->posts()->count() }})</small></h1>
	</div>
	<div class="col-md-2">
		<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-block pull-right">Edit</a>
	</div>
	<div class="col-md-2">
	
	{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
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
					<th>Category</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach($category->posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>
						@foreach($post->tags as $tag)
						<span class="label label-default">{{ $category->name }}</span>
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

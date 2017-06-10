@extends('admins.main')

@section('title', '| Tags')
@section('stylesheet')

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Tags <small>All tags Overview</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Name</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
			@foreach($tags as $tag)
				<tr>
					<td>{{ $tag->id }}</td>
					<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
					<td><a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-default btn-sm">Edit</a></td>	
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<div class="well">
			{!! Form::open(['route' => 'tags.store','method' => 'POST']) !!}
			<h2>Create Tag</h2>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name',null ,['class' => 'form-control']) }}

			{{ Form::submit('Add Tag', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
@extends('main')

@section('title', '| Tags')
@section('stylesheet')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Tags</h1>
		<table class="table">
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
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-3">
		<div class="well">
			{!! Form::open(['route' => 'tags.store','method' => 'POST']) !!}
			<h2>Create Tag</h2>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name',null ,['class' => 'form-control']) }}

			{{ Form::submit('Add Tag', ['class' => 'btn btn-primary btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
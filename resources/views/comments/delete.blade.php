@extends('main')

@section('titile', '| Edit Comment')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Do you want to delete this comment?</h1>
		<p>
			<strong>Name:</strong>{{ $comment->name }}<br>
			<strong>Email:</strong>{{ $comment->name }}<br>
			<strong>Comment:</strong>{{ $comment->comment }}
		
		{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
			{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-lg']) }}
		{{ Form::close() }}
		</p>
	</div>
</div>
@endsection
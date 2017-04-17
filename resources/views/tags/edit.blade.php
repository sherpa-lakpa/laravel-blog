@extends('main')

@section('title', "| Edit")

@section('content')
<div class="row">
	<div class="col-md-8">
		{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}

		{{ Form::label('name', 'Name:') }}

		{{ Form::text('name', null, ['class' => 'form-control input-md']) }}

		{{ Form::submit('Save changes',['class' => 'btn btn-success form-spacing-top']) }}
		{!! Form::close() !!}

	</div>
</div>

@endsection
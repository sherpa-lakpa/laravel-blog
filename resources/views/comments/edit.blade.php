@extends('main')

@section('titile', '| Edit Comment')

@section('content')
{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}

{{ Form::label('name') }}
{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

{{ Form::label('email') }}
{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}

{{ Form::label('comment', 'Comment:') }}
{{ Form::textarea('comment', null, ['class' => 'form-control'])}}

{{ Form::submit('Edit comment', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;'])}}
{{ Form::close() }}
@endsection
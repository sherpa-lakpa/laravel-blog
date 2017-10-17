@extends('admins.main')

@section('titile', '| Edit Comment')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


@endsection

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

@section('scripts')

<!-- jQuery -->
<script src="../../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../admins/js/bootstrap.min.js"></script>

@endsection
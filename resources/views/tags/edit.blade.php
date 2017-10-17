@extends('admins.main')

@section('title', "| Edit")

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../../admins/css/sb-admin.css" rel="stylesheet">

<<<<<<< HEAD
<!-- Custom Fonts -->
<link href="../../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


=======
>>>>>>> 688a4c38d431c09417f4125d56b10ec7c461a232
@endsection

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

@section('scripts')

<!-- jQuery -->
<script src="../../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../admins/js/bootstrap.min.js"></script>

@endsection

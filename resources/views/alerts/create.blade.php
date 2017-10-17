@extends('admins.main')

@section('title', '| Create new post')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	{!!	Html::style('css/parsley.css')	!!}
	{!!	Html::style('css/select2.min.css')	!!}

@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">
		Create New Post
		</h1>
	</div>
</div>
<!-- /.row -->
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<hr>
		{!! Form::open(['route' => 'alerts.store','data-parsley-validate' => '', 'files' => true]) !!}
    		{{ Form::label('title', 'Title: ') }}
    		{{ Form::text('title', null, array('class' => 'form-control','required' => '','maxlength' => '255')) }}

    		{{	Form::label('message', "Message: ", ['class' => 'form-spacing-top'])	}}
    		{{	Form::textarea('message', null, array('class' => 'form-control'))	}}
			
			{{ Form::label('type', 'Type:', ['class' => 'form-spacing-top']) }}
			<select class="form-control" name="type">
				<option value="default" class="label label-default">default</span></option>
				<option value="primary" class="label label-primary">primary</span></option>
				<option value="success" class="label label-success">success</span></option>
				<option value="info" class="label label-info">info</span></option>
				<option value="warning" class="label label-warning">warning</span></option>
				<option value="danger" class="label label-danger">danger</span></option>
			</select>
    		
    		{{	Form::submit('Create Alert', array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top:20px'))	}}
		{!! Form::close() !!}
	</div>
	</div>
@endsection

@section('scripts')

<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>


	{!!	Html::script('js/parsley.min.js')	!!}
	{!!	Html::script('js/select2.min.js')	!!}

@endsection

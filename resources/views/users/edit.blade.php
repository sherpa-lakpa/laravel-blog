@extends('admins.main')

@section('title','| Edit Post')

@section('stylesheet')
<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


	{!!	Html::style('css/parsley.css')	!!}
	{!!	Html::style('css/select2.min.css')	!!}

@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Edit User <small> ({{ $user->name }})</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
	<div class="col-md-8" style="word-wrap: break-word">
		{{ Form::hidden('user_id', Auth::user()->id, array('class' => 'form-control','required' => '')) }}
		
		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', null, ['class' => 'form-control input-lg']) }}

		{{ Form::label('email', 'Email:') }}
		{{ Form::text('email', null, ['class' => 'form-control input-lg']) }}

		{{ Form::label('skills', 'Skills:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('skills[]', $skills2, null, ['class' => 'form-control select2-multi','multiple' => 'multiple']) }}

		{{ Form::label('bio', 'Bio:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('bio',null, ['class' => 'form-control']) }}

		{{ Form::label('birth', 'Birth:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('birth',null, ['class' => 'form-control']) }}

		{{ Form::label('home', 'Location:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('home',null, ['class' => 'form-control']) }}

		{{ Form::label('gender', 'Gender:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('gender', ["Male" => 'Male',"Female" => 'Female'], ['class' => 'form-control select2-multi','multiple' => 'multiple']) }}

		{{ Form::label('admin', 'Admin:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('admin', ['No', 'Yes'], ['class' => 'form-control select2-multi','multiple' => 'multiple']) }}

	</div>

	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($user->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">

					{!! Html::linkRoute('users.show', 'Cancel', array($user->id), array('class' => 'btn btn-primary btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

<!-- jQuery -->
<script src="../../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../admins/js/bootstrap.min.js"></script>


	{!!	Html::script('js/parsley.min.js')	!!}
	{!!	Html::script('js/select2.min.js')	!!}

<script type="text/javascript">
	$(".select2-multi").select2();
	$(".select2-multi").select2().val({!! json_encode($user->skills->pluck('id')) !!}).trigger("change");
</script>
@endsection

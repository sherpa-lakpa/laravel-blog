@extends('admins.main')

@section('title', '| All Pages')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

	{!!	Html::style('css/parsley.css')	!!}
	{!!	Html::style('css/select2.min.css')	!!}

	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=j2pgd7w5h7sg6k7tqn7c5kvhy6pq44ikq4mt6yj1emaxdpb3"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'link code',
			menubar: false
		});
	</script>
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
		{!! Form::open(['route' => 'pages.store','data-parsley-validate' => '', 'files' => true]) !!}
    		{{ Form::label('name', 'Name: ') }}
    		{{ Form::text('name', null, array('class' => 'form-control','required' => '','maxlength' => '255')) }}
    		{{	Form::label('body', "Page Body: ", ['class' => 'form-spacing-top'])	}}
    		{{	Form::textarea('body', null, array('class' => 'form-control'))	}}
    		
    		{{	Form::submit('Create Page', array('class' => 'btn btn-success btn-lg btn-block','style' => 'margin-top:20px'))	}}
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

<script type="text/javascript">
	$(".select2-multi").select2({
	  tags: true
	})
</script>
@endsection

@extends('admins.main')

@section('title','| Edit Page')

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

	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
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
		<h1 class="page-header">
		Edit Page <small> ({{ $page->page }})</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	{!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'PUT', 'files' => true]) !!}
	<div class="col-md-8" style="word-wrap: break-word">

		{{ Form::hidden('page', $page->page, ['class' => 'form-control input-lg']) }}

		{{ Form::label('name', 'Name:') }}
		{{ Form::text('name', $page->name, ['class' => 'form-control input-lg']) }}

		{{ Form::label('image', 'Update Image', ['class' => 'form-spacing-top']) }}
		{{ Form::file('image')}}
		
		{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('body',null, ['class' => 'form-control']) }}
	</div>

	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($page->created_at)) }}</dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($page->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('pages.show', 'Cancel', array($page->id), array('class' => 'btn btn-danger btn-block')) !!}
					
				</div>
				<div class="col-sm-6">
					{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
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
</script>
@endsection

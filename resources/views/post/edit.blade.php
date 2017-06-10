@extends('admins.main')

@section('title','| Edit Post')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../../admins/css/sb-admin.css" rel="stylesheet">

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
		Edit Post <small> ({{ $post->title }})</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
	<div class="col-md-8" style="word-wrap: break-word">
		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

		{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('slug', null, ['class' => 'form-control input-sm']) }}

		{{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('category_id', $cats, null ,['class' => 'form-control']) }}

		{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','multiple' => 'multiple']) }}

		{{ Form::label('featured_image', 'Update featured Image', ['class' => 'form-spacing-top']) }}
		{{ Form::file('featured_image')}}
		
		{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('body',null, ['class' => 'form-control']) }}
	</div>

	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					
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
	$(".select2-multi").select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger("change");
</script>
@endsection

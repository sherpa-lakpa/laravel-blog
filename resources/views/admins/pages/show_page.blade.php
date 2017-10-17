@extends('admins.main')

@section('title','| View Post')

@section('stylesheet')

<!-- added to overcome bootstrap load fail -->
<!-- Bootstrap Core CSS -->
<link href="../admins/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../admins/css/sb-admin.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../admins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


@endsection

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header" style="text-align: center;">
			Page - <small>{{ $page->page }}</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-1" style="padding-right: 0px;">
	<a href="{{ route('pages.edit', $page->id) }}" class="btn btn-default btn-md btn-block">Edit</a>
	</div>
	<div class="col-md-1" style="padding-left: 1px;">
	{!! Form::open(['route' => ['pages.destroy', $page->id],'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' =>  'btn btn-default btn-md btn-block']) !!}
	{!! Form::close() !!}
	</div>
</div>
<div class="biographys">
	<div class="col-md-4 biography-info">
		<img src="../images/{{ $page->image }}" class="img-responsive" alt=""/>
	</div>
	<div class="col-md-8 biography-into">
		<h4>{{ $page->name }}</h4>
		<p></p>
				<p style="clear:both">{!! $page->body !!}</p>
	</div>
			<div class="clearfix"> </div>
</div>

@endsection

@section('scripts')

<!-- jQuery -->
<script src="../admins/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../admins/js/bootstrap.min.js"></script>

@endsection

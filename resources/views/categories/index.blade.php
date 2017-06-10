@extends('admins.main')

@section('title', '| Category')

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Categories <small>All categories Overview</small>
		</h1>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
				<tr>
					<td>#</td>
					<td>Name</td>
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{ $category->id }}</td>
					<td>{{ $category->name }}</td>
					<td><a href="{{ route('categories.show', $category->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-default btn-sm">Edit</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div> <!-- end of md 8 !-->
	<div class="col-md-4">
		<div class="well">
			{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
			<h2> Create Category </h2>
			 {{ Form::label('name', 'Name: ') }}
			 {{ Form::text('name', null, ['class' => 'form-control']) }}
			  
			 {{ Form::submit('Add Category', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
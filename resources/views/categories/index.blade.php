@extends('main')

@section('title', '| Category')

@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>Categies</h1>
		<table class="table">
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
			  
			 {{ Form::submit('Submit', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
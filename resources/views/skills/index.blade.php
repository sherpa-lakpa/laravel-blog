@extends('admins.main')

@section('title', '| Tags')
@section('stylesheet')

@section('content')
<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Skills
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-code"></i> Skills
            </li>
        </ol>
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
					<td></td>
				</tr>
			</thead>
			<tbody>
			@foreach($skills as $skill)
				<tr>
					<td>{{ $skill->id }}</td>
					<td><a href="{{ route('skills.show', $skill->id) }}">{{ $skill->name }}</a></td>
					<td><a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-default btn-sm">Edit</a>
					{!! Form::open(['route' => ['skills.destroy', $skill->id], 'method' => 'DELETE','class' => 'form']) !!}
					{{ Form::submit('Delete', ['class' => 'btn btn-default btn-sm']) }}
					{{ Form::close() }}

					</td>	
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<div class="well">
			{!! Form::open(['route' => 'skills.store','method' => 'POST']) !!}
			<h2>Create Skill</h2>
			{{ Form::label('name', 'Name:') }}
			{{ Form::text('name',null ,['class' => 'form-control']) }}

			{{ Form::submit('Add Skill', ['class' => 'btn btn-success btn-block btn-h1-spacing']) }}

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection
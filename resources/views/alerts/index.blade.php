@extends('admins.main')

@section('title', '| All Users')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Alerts
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-bell"></i> Alerts
            </li>
        </ol>
	</div>
</div>
<div class="col-md-9">
		</div>
		<div class="col-md-1 col-md-offset-1">
			<a href="@if(Auth::user()->admin)
								{{ route('alerts.create') }}
								@else
								{{ "javascript:;" }}
								@endif" class="btn btn-md btn-primary" {{ Auth::user()->admin ? "" : "disabled" }}>Create New Alert</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Message</th>
					<th>Received</th>
					<th></th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($alerts as $alert)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<td>{{ $alert->title	}}</td>
						<td>{{ $alert->message }}</td>
						<td>{{	date('M j, Y', strtotime($alert->created_at))	}}</td>
						<td>
						{!! Form::open(['route' => ['alerts.destroy', $alert->id],'method' => 'DELETE']) !!}

						@if(Auth::user()->admin)
						{!! Form::submit('Delete', ['class' =>  'btn btn-default btn-sm']) !!}
						@else
						{!! Form::submit('Delete', ['class' =>  'btn btn-default btn-sm','disabled' => '','id' => 'mySubmit']) !!}
						<script type="text/javascript">
							document.getElementById("mySubmit").disabled = true;
						</script>
						@endif

					{!! Form::close() !!}
						</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{!! $alerts->links() !!}
			</div>
		</div>
	</div>
@endsection
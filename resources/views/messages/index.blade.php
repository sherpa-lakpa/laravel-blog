@extends('admins.main')

@section('title', '| All Users')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Messages
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-envelope"></i> Messages
            </li>
        </ol>
	</div>
</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Author</th>
					<th>Email</th>
					<th>Message</th>
					<th>Created at</th>
					<th></th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($contacts as $contact)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<td>{{ $contact->name	}}</td>
						<td>{{ $contact->email	}}</td>
						<td>{{ $contact->message }}</td>
						<td>{{	date('M j, Y', strtotime($contact->created_at))	}}</td>
						<td>
						{!! Form::open(['route' => ['posts.destroy', $contact->id],'method' => 'DELETE']) !!}

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
				{!! $contacts->links() !!}
			</div>
		</div>
	</div>
@endsection
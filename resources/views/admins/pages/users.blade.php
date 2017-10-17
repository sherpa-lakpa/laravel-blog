@extends('admins.main')

@section('title', '| All Users')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Users
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-users"></i> Users
            </li>
        </ol>
	</div>
</div>
<!-- /.row -->
	<div class="row">
	<div class="col-md-9">
		</div>
		<div class="col-md-1 col-md-offset-1">
			<a href="@if(Auth::user()->admin)
								{{ route('users.create') }}
								@else
								{{ "javascript:;" }}
								@endif" class="btn btn-md btn-primary" {{ Auth::user()->admin ? "" : "disabled" }}>Create New User</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
		
	</div> <!-- End of the row !-->
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created at</th>
					<th></th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($users as $user)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<td>{{ $user->name	}}</td>
						<td>{{ $user->email }}</td>
						<td>{{	date('M j, Y', strtotime($user->created_at))	}}</td>

						<td><a href="#aboutModal" data-toggle="modal" data-target="#{{ $x }}myModal" class="btn btn-default btn-sm">View</a>
						<a href="@if(Auth::user()->id == $user->id || Auth::user()->admin)
								{{ route('users.edit', $user->id) }}
								@else
								{{ "javascript:;" }}
								@endif" class="btn btn-default btn-sm" {{ Auth::user()->id == $user->id || Auth::user()->admin ? "" : "disabled" }}>Edit</a>
						</td>	
						</tr>
						<?php
							$splitName = explode(' ', $user->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
							$first_name = $splitName[0];
							$last_name = !empty($splitName[1]) ? $splitName[1] : ''; // If last name doesn't exist, make it empty
						 ?>
					 <!-- Modal -->
				    <div class="modal fade" id="{{ $x }}myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				        <div class="modal-dialog">
				            <div class="modal-content">
				                <div class="modal-header">
				                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				                    <h4 class="modal-title" id="myModalLabel">More About {{ $first_name }}</h4>
				                    </div>
				                <div class="modal-body">
				                    <center>
				                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($user->email)))."?d=wavatar" }}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
				                    <h3 class="media-heading">{{ $user->name }} <small>{{ $user->home }}</small></h3>
				                    <span><strong>Skills: </strong></span>
				                    	@foreach($user->skills as $skill)
				                        <span class="label label-info">{{ $skill->name }}</span>
				                        @endforeach
				                    </center>
				                    <hr>
				                    <center>
				                    <p class="text-left"><strong>Bio: </strong><br>
				                        {{ $user->bio }}</p>
				                    <br>
				                    </center>
				                </div>
				                <div class="modal-footer">
				                    <center>
				                    <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about {{ $last_name }}</button>
				                    </center>
				                </div>
				            </div>
				        </div>
					
					@endforeach
				</tbody>
			</table>{{-- 
			<div class="text-center">
				{!! $posts->links() !!}
			</div> --}}
		</div>
	</div>
@endsection
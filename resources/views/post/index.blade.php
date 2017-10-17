@extends('admins.main')

@section('title', '| All posts')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">

		Posts
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i><a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file-text"></i> Posts
            </li>
        </ol>
	</div>
</div>
<!-- /.row -->
	<div class="row">
		<div class="col-md-9">
		</div>
		<div class="col-md-1 col-md-offset-1">
			<a href="{{ route('posts.create') }}" class="btn btn-md btn-primary">Create New Post</a>
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
					<th>title</th>
					<th>body</th>
					<th>Created at</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($posts as $post)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<td>{{	$post->title	}}</td>
						<td>
						{{	substr($post->body, 0, 50)	}}
						{{ strlen($post->body) > 50 ? "...." : "" }}
						</td>
						<td>{{	date('M j, Y', strtotime($post->created_at))	}}</td>
						<td>
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>

						<a href="@if(Auth::user()->id == $post->user_id || Auth::user()->admin)
								{{ route('posts.edit', $post->id) }}
								@else
								{{ "javascript:;" }}
								@endif" class="btn btn-default btn-sm" {{ Auth::user()->id == $post->user_id || Auth::user()->admin ? "" : "disabled" }}>Edit</a>

						{!! Form::open(['route' => ['posts.destroy', $post->id],'method' => 'DELETE']) !!}
						
						@if(Auth::user()->id == $post->user_id || Auth::user()->admin)
						{!! Form::submit('Delete', ['class' =>  'btn btn-default btn-sm']) !!}
						@else
						{!! Form::submit('Delete', ['class' =>  'btn btn-default btn-sm','disabled' => 'disabled','id' => 'mySubmit']) !!}
						@endif
						<script type="text/javascript">
							document.getElementById("mySubmit").disabled = true;
						</script>

						{!! Form::close() !!}
						</td>	
						</tr>
					
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
@endsection
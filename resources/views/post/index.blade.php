@extends('admins.main')

@section('title', '| All posts')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Posts <small>All posts Overview</small>
		</h1>
	</div>
</div>
<!-- /.row -->
	<div class="row">
		<div class="col-md-8">
		</div>
		<div class="col-md-2 col-md-offset-1">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary">Create New Post</a>
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
					<th></th>
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

						<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a></td>	
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
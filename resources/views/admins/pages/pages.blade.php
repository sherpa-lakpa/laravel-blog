@extends('admins.main')

@section('title', '| All Users')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Pages
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Pages
            </li>
        </ol>
	</div>
</div>
<!-- /.row -->
	<div class="row">
		<div class="col-md-9"></div>
	<div class="col-md-1 col-md-offset-1">
			<a href="{{ route('pages.create') }}" class="btn btn-md btn-primary">Create New Page</a>
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
					<th>Page</th>
					<th>title</th>
					<th>Body</th>
					<th>Created at</th>
					<th></th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($pages as $page)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<th>{{ $page->page }}</th>
						<td>{{ $page->name	}}</td>
						<td>{{ $page->body }}</td>
						<td>{{	date('M j, Y', strtotime($page->created_at))	}}</td>

						<td><a href="{{ route('pages.show', $page->id) }}" class="btn btn-default btn-sm">View</a><a href="{{ route('pages.edit', $page->id) }}" class="btn btn-default btn-sm">Edit</a></td>	
						</tr>
					
					@endforeach
				</tbody>
			</table>{{-- 
			<div class="text-center">
				{!! $posts->links() !!}
			</div> --}}
		</div>
	</div>
@endsection
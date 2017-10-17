@extends('admins.main')

@section('title', '| All Users')

@section('content')

<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
		Comments
		</h1>
		<ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="/admin">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-comments"></i> Comments
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
					<th>Comment</th>
					<th>Created at</th>
					<th></th>
				</thead>
				<tbody>
				<?php $x = 0; ?>
					@foreach ($comments as $comment)
						<tr>
						<th>{{ $x = $x + 1	}}</th>
						<td>{{ $comment->name	}}</td>
						<td>{{ $comment->comment }} <b><i>on</i> {{ $comment->title }}</b></td>
						<td>{{	date('M j, Y', strtotime($comment->created_at))	}}</td>
						<td>
						{!! Form::open(['route' => ['comments.destroy', $comment->id],'method' => 'DELETE']) !!}

						@if(Auth::user()->email == $comment->email || Auth::user()->id == $comment->user_id || Auth::user()->admin)
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
				{{-- {!! $comments->links() !!} --}}
			</div>
		</div>
	</div>
@endsection
@extends('main')

@section('title',"| Posts")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Blog</h1>
		</div>
	</div>

    @foreach($posts as $post)
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    	<hr>
    		<h2>{{ $post->title }}</h2>
    		<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

    		<p>{{ substr($post->body, 0,100) }}{{ strlen($post->body) > 100 ? "...." : "" }}</p>

    		<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-md">Read more</a>

    	</div>
    </div>
    @endforeach
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
@endsection
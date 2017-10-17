@extends('main')

@section('title', '| About')

@section('content')
      <!-- header -->
<div class="about">

<div class="container">
<div class="biography">
<?php $x=0; ?>
	@foreach($data as $about)
	<?php $x=$x+1; ?>
		@if($x%2 == 1)
		<div class="biographys">
			<div class="col-md-4 biography-info">
				<img src="images/{{ $about->image }}" class="img-responsive" alt=""/>
			</div>
			<div class="col-md-8 biography-into">
				<h4>{{ $about->title }}</h4>
				<p></p>
				<p style="clear:both">{!! $about->body !!}</p>
			</div>
					<div class="clearfix"> </div>
		</div>
		@else
		<div class="biographys">
			<div class="col-md-8 biography-into">
				<h4>{{ $about->title }}</h4>
				<p></p>
				<p style="clear:both">{!! $about->body !!}</p>
			</div>
			<div class="col-md-4 biography-info">
				<img src="images/{{ $about->image }}" class="img-responsive" alt=""/>
			</div>
				<div class="clearfix"> </div>
		</div>
		@endif
	@endforeach
</div>
	</div>
	</div>

@endsection

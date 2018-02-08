@extends('layouts.app') @section('content')
<div class="container">
	<div class="row">

		<div class="col-md-8">

			@include('threads._list')
		</div>
		<div class="col-md-4">
			<div class="panel panel-default shadow">
				<div class="panel-heading " style=" text-align:center">
					Search
				</div>

				<div class="panel-body ">
					<form method="GET" action="/threads/search">
						<input type="text" style="box-sizing:inherit;margin-bottom	:12px;" placeholder="Search for something..." class="form-control"
						 name="q" id="">
						<button type="submit" class="btn smth shadow btn-link" style=" text-decoration:none;display:block;
						text-align:center ;
					border-radius:5px;
					margin:0 auto ;">
						<i class="	glyphicon glyphicon-search
						" style="-webkit-text-stroke: 1px white;height:1px;" aria-hidden="true"></i> SEARCH
							
						</button>
					</form>
				</div>

			</div>

			<!--/.Card content-->

			@if(count($trending))
			<div class="panel panel-default shadow">
				<div class="panel-heading" style="text-align:center">
					Trending Threads
				</div>

				<ul class="list-group">
					@foreach($trending as $thread)

					<li class="list-group-item">
						<a href="{{url($thread->path)}}">
							<p>{{$thread->title}}</p>
						</a>
					</li>
					@endforeach
				</ul>

			</div>
			@endif



		</div>
	</div>
</div>
@endsection
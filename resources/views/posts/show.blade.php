@extends('layouts.apped')

@section('content')

<div class="showpage">
	<div class="row">
		<div class="col-md-8">
			@include('extra.ico-intro')
			<hr>
			@include('extra.tabs')
		</div>
		<div class="col-md-4">
			@include('extra.table')
		</div>
	</div>
</div>


	@if(!Auth::guest())
		<div class="container row">
			<div class="col-sm-1">
				<a href="/posts/{{$post->id}}/edit" class="btn btn-default pull-left">Edit</a>
			</div>
			<div class="col-sm-1">
				{!!Form::open(['action'=>['postsController@destroy',$post->id],'method'=>'POST', 'class'=>'pull-left'])!!}
					{{Form::hidden('_method','DELETE')}}
					{{Form::submit('Delete',['class'=>'text-danger','style'=>'border:none;outline:none;background:transparent;cursor:pointer;padding-top:15%;'])}}
				{!!Form::close()!!}
			</div>
		</div>
	@endif

@endsection
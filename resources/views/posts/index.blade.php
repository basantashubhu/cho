@extends('layouts.apped')

@section('content')
<div class="row altered">
	<div class="col-md-3">
		<div style="padding:10% 0 0 12%;">
			<h3>Browse ICOs</h3>
			{{Form::open(['class'=>'form-group','style'=>'border: 1px solid rgba(211,211,211,0.8);padding:5%;background:#fff;border-radius:5px;box-shadow:0 5px 5px rgba(0,0,0,0.5);'])}}
	    	<div class="form-group">
	    		<b>{{Form::label('search','Search')}}</b>
	    		{{Form::text('search_box','',['class'=>'form-control'])}}
	    		<hr>
	    	</div>

@php
$category= '';
foreach ($posts as $post) {
	$category .= $post->categories;
}
$categories = explode(',', $category);
$categories = array_unique($categories);
@endphp
@include('inc.category-list')

	    	<div class="form-group">
	    		<b>{{Form::label('category','Category')}}</b>
	    		<select class="form-control" name="category" id="category">
	    			<option value="">All</option>
	    			 
					 @foreach($categories as $cat)
						@if($loop->last)
							@break
						@endif
						<option value="{{$cat}}"></option>
					@endforeach

	    		</select>
	    	</div>

	    	<div class="form-group">
	    		<b>{{Form::label('features','Features',['style'=>'display:block;'])}}</b>
	    		<input type="checkbox" name="feature_bonus" id="bonus"><label for="bonus">&nbsp Bonus available</label><br>
	    		<input type="checkbox" name="feature_bounty" id="bounty"><label for="bounty">&nbsp Bounty available</label><br>
	    		<input type="checkbox" name="feature_team" id="team"><label for="team">&nbsp Public team</label><br>
	    		<input type="checkbox" name="feature_rating" id="ratings"><label for="ratings">&nbsp Expert ratings</label><br>
	    	</div>

	    	<div class="form-group">
	    		<b>{{Form::label('rating','Rating')}}</b>
	    		<select class="form-control" name="rating">
	    			<option value="">Any</option>
	    			<option value="4">4+</option>
	    			<option value="3">3+</option>
	    			<option value="-3">3-</option>
	    		</select>
	    	</div>

			<div class="row">
				<div class="col-md-6">	
			    	<div class="form-group">
			    		<b>{{Form::label('start','Start after')}}</b>
			    		{{Form::date('start_date','',['class'=>'form-control'])}}
			    	</div>
			    </div>
			    <div class="col-md-6">
			    	<div class="form-group">
			    		<b>{{Form::label('end','End before')}}</b>
			    		{{Form::date('end_date','',['class'=>'form-control'])}}
			    	</div>
			    </div>
			</div>

@php
$country= '';
foreach ($posts as $post) {
	$country .= title_case($post->country_of_operation).',';
}
$countries = explode(',', $country);
$countries = array_unique($countries);
@endphp
	    	<div class="form-group">
	    		<b>{{Form::label('country','Country')}}</b>
	    		<select class="form-control" name="country">
	    			<option value="">Any</option>

	    			@foreach($countries as $con)
		    			@if($loop->last)
			    			@break
		    			@endif
		    			<option value="{{ $con }}">{{ $con }}</option>
	    			@endforeach

	    		</select>
	    	</div>

			{!! Form::close() !!}
		</div>
	</div>

	<div class="col-md-9" id="table-container-posts" style="margin-top: 5%; background: #fff;"> 

		@include('posts.table')

	</div>
</div>
@include('posts.js')
@endsection



<div class="row">
	<div class="col-md-12">
		<strong>New notificaitons</strong>
		@foreach($unseen as $unnotice)
			<div class="form-group p-2 table-bordered">
				<label class="text-primary">{{ $unnotice->name }}</label>
				<span class="fa fa-bell"></span> 
				<p>{{ $unnotice->msg }}</p>
				<a href="{{ $unnotice->link }}">click to see</a>
				<button class="btn btn-sm ml-5 py-0 btn-secondary mark-read" 
				data-action="{{ route('notifications.edit', ['notification'=> $unnotice->id]) }}">
					mark read
				</button>
				<button class="btn btn-sm ml-3 py-0 bg-warning see-later"
				data-action="{{ route('notifications.show', ['notification'=> $unnotice->id]) }}">
					see later
				</button>
			</div>
		@endforeach
		<hr>
		<strong>See later</strong>
		@isset($later)
		@foreach($later as $laternot)
			<div class="form-group p-2 table-bordered">
				<label>{{ $laternot->name }}</label>
				<span class="fa fa-bell"></span> 
				<p>{{ $laternot->msg }}</p>
				<a href="{{ $laternot->link }}">click to see</a>
				<button class="btn btn-sm ml-5 py-0 btn-secondary mark-read" 
				data-action="{{ route('notifications.edit', ['notification'=> $laternot->id]) }}">
					mark read
				</button>
			</div>
		@endforeach
		@endisset
		<hr>
		<strong>Marked read</strong>
		@isset($seen)
		@foreach($seen as $senotice)
			<div class="form-group p-2 table-bordered">
				<label>{{ $senotice->name }}</label>
				<i class="fa fa-eye"></i> 
				<p>{{ $senotice->msg }}</p>
				<a href="{{ $senotice->link }}">click to see</a>				
			</div>
		@endforeach
		@endisset
	</div>
</div>
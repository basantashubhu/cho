
	@if(count($posts) > 0)
		<table class="all-coins">
			<thead style="border-bottom: 1px solid rgba(211,211,211,0.3);">
				@isset($tot)
					<tr>
						Total {{$tot}} results found.
					</tr>
				@endisset
				<th colspan="15">
					ICO
				</th>
				<th class="text-center">START</th>
				<th class="text-center">END</th>
				<th class="text-center">RATE</th>
			</thead>
		<tbody>			
		@foreach($posts as $post)

			<tr>
				<td colspan="5" rowspan="2" style="width: 7%;">
					<div style="height: 9vh; width: 4.5vw; border: 1px solid rgba(211,211,211,0.8);">
						<div style="margin: 4% 0 0 4%;">
							<img style="height: 8vh; width: 4vw;" 
							src="{{ route('cover', ['filename' => $post->id ]) }}">
						</div>
					</div>
				</td>
				<td colspan="10" style="width: 50%;">
					<a href="/posts/{{$post->id}}">{{$post->ico_name}}</a></br>
					<small>{!!$post->ico_slogan!!}</small>
				</td>
				<td class="denotations">{{Carbon\Carbon::parse($post->ico_start_date)->format('Y-m-d')}}</td>
				<td class="denotations">{{Carbon\Carbon::parse($post->ico_end_date)->format('Y-m-d')}}</td>
				<td class="denotations">4.8</td>
			</tr>
			<tr>
				<td colspan="10"><b>KYC:</b> {{$post->kyc}} |<b> Whitelist:</b> {{$post->whitelist}} |<b> Restrictions: </b>{{$post->restricted_country}}</td>
				@if(!Auth::guest())
					<td>
						<a href="/posts/{{$post->id}}/edit" class="btn pull-left">Edit</a>
					</td>				
					<td>
						{!!Form::open(['action'=>['postsController@destroy',$post->id],'method'=>'POST', 'class'=>'pull-left'])!!}
							{{Form::hidden('_method','DELETE')}}
							{{Form::submit('Delete',['class'=>'text-danger','style'=>'border:none;outline:none;background:transparent;cursor:pointer;padding-top:15%;'])}}
						{!!Form::close()!!}
					</td>
				@endif				
			<tr>
			</tr>
			<td colspan="5"><div style="border-bottom:1px solid rgba(211,211,211,0.5);"></div></td>
			<td colspan="10"><div style="border-bottom:1px solid rgba(211,211,211,0.5);"></div></td>
			<td><div style="border-bottom:1px solid rgba(211,211,211,0.5);"></div></td>
			<td><div style="border-bottom:1px solid rgba(211,211,211,0.5);"></div></td>
			<td><div style="border-bottom:1px solid rgba(211,211,211,0.5);"></div></td>

			</tr>

		@endforeach
		</tbody>
		</table>
		{{$posts->links()}}
	@else
		<p>No posts found</p>
	@endif
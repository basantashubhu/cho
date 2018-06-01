<table class="table table-responsive table-bordered" >
	<thead>
		<tr>
			<th style="width: 10%;">S.N</th>
			<th style="width: 35%;">Name</th>
			<th style="width: 45%;">Email</th>
			<th style="width: 20%; text-align: center;">Total Posts</th>
		</tr>
	</thead>
	<tbody>
		@isset($users)
			@foreach($users as $user)
				<tr>
					<td data-name="SN">{{ $user->id }}</td>
					<td data-name="Name">{{ $user->name }}</td>
					<td data-name="Email">{{ $user->email }}</td>
					<td data-name="Posts" style="text-align: center;">{{ count($user->posts) }}</td>
				</tr>				
			@endforeach
		@endisset
	</tbody>
</table>
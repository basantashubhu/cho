			<div class="container" style="border: 1px solid rgba(211,211,211,0.8);background: #fff;border-radius: 5px; padding: 5%;">
				<h1 class="text-success text-center"><b>4.3</b></h1>
				<center><sub>21 expert ratings</sub></center>
				<hr>
				<center>
				<div class="row">
					<div class="container col-sm-3">
						<h2><b>4.9</b></h2>
						<sub>ICO PROFILE</sub>
					</div>
					<div class="container col-sm-3">
						<h2><b>4.6</b></h2>
						<sub>TEAM</sub>
					</div>
					<div class="container col-sm-3">
						<h2><b>4.1</b></h2>
						<sub>VISION</sub>
					</div>
					<div class="container col-sm-3">
						<h2><b>4.1</b></h2>
						<sub>PRODUCT</sub>
					</div>
				</div>
				<hr>
				<a href="#">View rating distribution</a>
				</center>
			</div>
			<div class="container" style="border: 1px solid rgba(211,211,211,0.8);background: #fff;border-radius: 5px; padding: 5%; margin-top: 4%;">
				<h3>
					<b>
					      @include('inc.timer')	
		                  <b id ="days{{$post->id}}"></b> Days
		                  <b id ="hours{{$post->id}}"></b> hours
		                  {{-- <b id ="sec{{$post->id}}"></b> sec --}}
					</b>
				</h3>
				<p class="text-muted">{{Carbon\Carbon::parse($post->ico_start_date)->format('Y-m-d')}} To 
					{{Carbon\Carbon::parse($post->ico_end_date)->format('Y-m-d')}}</p>
				<hr>
				<table class="table table-striped">
					<tr class="ico-key">
						<td>Token</td>
						<td><b>{{$post->token_name}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>PreICO Price</td>
						<td><b>{{$post->pre_ico_price}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Price</td>
						<td><b>{{$post->current_ico_price}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Bonus</td>
						<td><b>{{$post->bonus}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Bounty</td>
						<td><b>{{$post->bounty}}
	
						@if($post->bounty ==='Available' )

						 <a href="{{$post->link_to_bounty}}" title="Go to bounty"><i class="fas fa-share-square text-muted"></i></a></b></td>
					</tr>
					@endif
					<tr class="ico-key">
						<td>Platform</td>
						<td><b>{{$post->platform}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Accepting</td>
						<td><b>{{$post->accepting}}</b></td>
					</tr>
					@if(!empty($post->minimum_investment))
					<tr class="ico-key">
						<td>Min. investment</td>
						<td><b>{{$post->minimum_investment}}</b></td>
					</tr>
					@endif
					<tr class="ico-key">
						<td>Soft cap</td>
						<td><b>{{$post->soft_cap}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Hard cap</td>
						<td><b>{{$post->hard_cap}}</b></td>
					</tr>
					<tr class="ico-key">
						<td>Country</td>
						<td><b>{{$post->country_of_operation}}</b></td>
					</tr>
				</table>
				<hr>
				<center><a href="{{$post->website_url}}" class="btn btn-lg btn-success">VISIT WEBSITE</a></center>
			</div>
<script>
	$(document).ready(function(){
		countdown();
	});
</script>			
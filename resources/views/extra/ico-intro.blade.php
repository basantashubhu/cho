			<div class="row">
				<div class="col-lg-1">
					<div style="height: 12vh; width: 6vw; border: 1px solid rgba(211,211,211,0.8);">
						<div style="margin: 3% 0 0 3%;">
							<img style="height: 11vh; width: 5.5vw;" 
							src="{{ route('cover', ['filename' => $post->id ]) }}">
						</div>
					</div>
				</div>
				<div class="col-lg-11">
					<div style="margin-left: 2.5%;">
					<h1>{{$post->ico_name}}</h1>
					<h4>{{$post->ico_slogan}}</h4>
					</div>
				</div>
			</div>
			<div class="text-justify">
				<hr>
				{!!$post->body!!}
			</div>
			<center>
				<div class="video-frame">		
					<div class="embed-responsive embed-responsive-16by9" style="width: 80%;">
					  {{-- <iframe class="embed-responsive-item" src="{{route('team-member.create')}}" allow="autoplay; encrypted-media" width="80%"></iframe> --}}
					  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/osyeTb4BTNg" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>
				</div>

				<a href="www.facebook.com/myfulu"><i class="fab fa-facebook-f text-muted" title="on Facebook"></i></a>
				<a href="twitter.com"><i class="fab fa-twitter text-muted" title="on Twitter"></i></a>
				<a href="github.com"><i class="fab fa-github-alt text-muted" title="on Github"></i></a>
				<a href="reddit.com"><i class="fab fa-reddit-alien text-muted" title="on Reddit"></i></a>
				<a href="bitcointalk.com"><i class="fab fa-bitcoin text-muted" title="on BitcoinTalk"></i></a>
				<a href="medium.com"><i class="fab fa-medium text-muted" title="on Medium"></i></a>
				<a href="telegram.io"><i class="fab fa-telegram text-muted" title="on Telegram"></i></a>

			</center>


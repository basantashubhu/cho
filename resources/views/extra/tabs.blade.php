<div class="ico-intro text-justify">
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#About">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#team">Team</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#milestone">Milestone</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Financial">Financial</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Ratings">Ratings</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="{{$post->link_to_whitepaper}}" target="_blank">Whitepaper</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="About">
    <p class="tab-linkings"><b>About {{$post->ico_name}}</b></p>
    <p>{!!$post->body!!}</p>
  </div>
  <div class="tab-pane" id="team">
    <p class="tab-linkings"><b>Team</b></p>
    <div class="row">
      
    @foreach($post->teamMembers as $member)
      <div class="col-md-4 mb-lg-3">
        <div class="container team-container">
          <center>
            <img src="{{route('member', ['filename' => $member->id])}}" class="img-fluid rounded-circle" style="height: 100px; width: 100px; margin: 0 auto 10px auto;"><br>
              <b class="text-center">{{$member->name}}</b>
              <p class="text-center">{{$member->position}}</p>
              <ul class="list-inline">                
              @if(isset($member->linked_link) && !empty($member->linked_link))
                  <li class="list-inline-item">
                    <a href="{{$member->linked_link}}"><i class="fab fa-linkedin fa-lg text-muted"></i></a>
                  </li>
              @endif                
              @if(isset($member->fb_link) && !empty($member->fb_link))
                  <li class="list-inline-item">
                    <a href="{{$member->fb_link}}"><i class="fab fa-facebook fa-lg text-muted"></i></a>
                  </li>
              @endif                
              {{-- @if(isset($member->twitter_link) && !empty($member->twitter_link)) --}}
                  <li class="list-inline-item">
                    <a href="{{$member->twitter_link}}"><i class="fab fa-twitter-square fa-lg text-muted"></i></a>
                  </li>
              {{-- @endif --}}
              </ul>
          </center>
        </div>
      </div>
    @endforeach

    </div>
  </div>
  <div class="tab-pane" id="milestone">
    <p class="tab-linkings"><b>Milestone</b></p>
    @if(isset($post->teamMembers()->first()->milestone_photo))
        <img src="{{route('milestone', ['filename' => $post->id])}}" class="img-fluid">
    @endif
  </div>
  <div class="tab-pane" id="Financial">
    <p class="tab-linkings"><b>Financial</b></p>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <b class="card-text">Token info</b>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <p>Token</p>
                <p>Platform</p>
                <p>Type</p>
                <hr>
                <p>Price in ICO</p>
                <hr>
              </div>
              <div class="col-sm-6">
                <p><b>{{$post->token_name}}</b></p>
                <p><b>{{$post->platform}}</b></p>
                <p><b>{{$post->token_type}}</b></p>
                <hr>
                <p><b>{{$post->ico_current_price}}</b></p>
              </div>
              <div class="container">
                <p class="text-muted">BONUS</p>
                <div class="row">
                  <div class="col-sm-6">
                    <p>Pre-sale</p>
                    <p>Main sale</p>
                  </div>
                  <div class="col-sm-6">
                    <p><b>{{$post->pre_sale_bonus}}</b></p>
                    <p><b>{{$post->main_sale_bonus}}</b></p>
                  </div>            
                </div>
              </div>
            </div>                  
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-6">
                Total tokens for sale
              </div>
              <div class="col-sm-6">
                  <b>{{$post->total_token_sale}}</b>
               </div>
            </div>
            @if(!empty($post->total_sold))
            <div class="row">
              <div class="col-sm-6">
                Tokens sold till now
              </div>
              <div class="col-sm-6">
                  <b>{{$post->total_token_sold}}</b>
               </div>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <b class="card-text">Investment info</b>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                @if(!empty($post->min_invest))
                <p>Min. investment</p>
                @endif
                <p>Accepting</p>
                <p>Distributed in ICO</p>
                <p>Soft cap</p>
                <p>Hard cap</p>
              </div>
              <div class="col-sm-6">
                @if(!empty($post->min_invest))
                <p><b>{{$post->minimum_investment}}</b></p>
                @endif
                <p><b>{{$post->accepting}}</b></p>
                <p><b>{{$post->distributed_ico}}</b></p>
                <p><b>{{$post->soft_cap}}</b></p>
                <p><b>{{$post->hard_cap}}</b></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="Ratings">
    <p class="tab-linkings"><b>Ratings</b></p>
  </div>
  
</div>
</div>
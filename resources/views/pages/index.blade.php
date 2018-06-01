@extends('layouts.apped')
@section('content')

<header class="v-header containerd">
  <div class="fullscreen-video-wrap">
    <video src="video/crypto.mp4" autoplay="true" loop="true"></video>
  </div>
  <div class="header-overlay"></div>  
  <div class="header-content">
    <h1>Invest Smart with BlogICO</h1>
    <p>ICOs ratings from top investors and experts</p>
    <a href="/posts" class="btn btn-primary browse">Browse ICOs</a>
  </div>
</header>

<section class="frame">

  <h3 class="text-center" style="padding:0 0 2rem 0;">Hot and trending ICOs</h3>

  <div class="responsive">
        @if(count($posts)>0)
           @foreach($posts as $post)


          <div class="card indiv-card">
              <img class="card-img-top" style="height: 25vh;" 
              src="{{ route('cover', ['filename' => $post->id ]) }}" alt="{{ $post->ico_name }}">
              <div class="card-body with-border">
                  <p><a href="/posts/{{$post->id}}" class="card-text">{{ $post->ico_name }}</a></p>

      
                @include('inc.timer')
      
                
                <i class="far fa-clock"></i>
                <small class="text-muted"> 
                  <b id ="days{{$post->id}}"></b> Days
                  <b id ="hours{{$post->id}}"></b> hours
                  {{-- <b id ="mins{{$post->id}}"></b> minutes --}}
                  {{-- <b id ="secs{{$post->id}}"></b> secondes --}}
                </small>
              </div>
          </div>
         @endforeach
        @endif

  </div>
</section>
<section>
  <div class="text-center">
    <img class="img-fluid launching" src="background_image/launch-background.gif">
    <div class="launch-overlay">
    <div style="margin-top: 5%;">
      <h2 class="text-white plan">Planning an ICO?</h2>
      <p class="text-white">We can help with wide range of support on all ICO stages</p>
      <a href="/posts/create" class="btn btn-lg btn-default btn-launch">Launch ICO</a>
    </div>
  </div>
  </div>
</section>
<section>
  <h1 class="text-center white">Stay up to date</h1>
  <h3 class="text-center">The Top 5 Cryptocurrency and Blockchain Stories of the Week...<br> Delivered Straight to Your Inbox</h3>
  {!! Form::open(['action'=>'postsController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
     <center>
       <div class="subs-form"> 
          {{Form::email('subs-email','',['class'=>'subs-email','placeholder'=>'Your best email'])}}
          <a href="#" class="btn btn-submit btn-danger" style="margin: -0.8% 0 0 0;">Subscribe</a>
        </div>
      </center>
  {!! Form::close() !!}

 </section>

<script>
$(function() {   
 $('.slide').slick({
     slidesToShow: 4,
     slidesToScroll: 4,
     autoplay: true,
     autoplaySpeed: 5000,
  });
});
$('.responsive').slick({
  dots: true,
  autoplay: true,
  infinite: true,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
countdown();
</script>
@endsection
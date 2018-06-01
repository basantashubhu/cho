<?php
  use App\Image;

  $logo = Image::latest()->first();
?>
 <nav class="navbar navbar-expand-lg sticky-top">
@if(isset($logo->logo))
  <a class="navbar-brand text-white" style="margin-top: 3%;" href="/">
    <div id="main-logo">
      <img class="img-fluid" src="{{ route('logo', ['filename' => $logo->logo]) }}"> 
    </div>
      <span style="line-height: 100px;">{{ $logo->company_name }}</span>
  </a>      
@endif
  {{-- <a class="navbar-brand text-white" style="margin-top: 3%;" href="/"><img style="width: 15%;" src="{{'storage\cover_images\logo\logo.png'}}"> BloICO</a> --}}
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="/posts">NEWS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/coint">COINS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/ico-database">ICO DATABASE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/events">EVENTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/about">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/contact">CONTACT</a>
      </li>

      <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  @if(auth()->user()->isAdmin == 'admin' || auth()->user()->isAdmin =='super_admin')
                                    <a href="/admin-dashboard" class="dropdown-item">Admin Dashboard</a>
                                  @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </ul>
  </div>
</nav>

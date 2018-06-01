<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{config('app.name','Pustakalaya')}}</title>
    <link rel="shortcut icon" href="/favicon.ico">
	
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick_slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
	
	{{-- custom css --}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

	<script src="{{asset('js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/fontawesome-all.min.js')}}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{asset('js/slick_slider.js')}}"></script>

</head>
<body>
	@include('inc.navbar')

		@include('inc.messages')
		
	@yield('content')		

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    @include('inc.footer')
</body>
</html>
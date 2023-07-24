<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="" name="keywords" />
	<meta content="" name="description" />
	<title>@yield('title')</title>

	{{-- Google Web Fonts --}}
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet" />

	{{-- Icon Font Stylesheet --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

	<link rel="stylesheet" href="{{ asset('dist/css/home-page/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/home-page/owl.carousel.min.css') }}">

	<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/home-page/style.css') }}">

    <script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
	{{-- Spinner Start --}}
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-grow text-primary" role="status"></div>
	</div>
	{{-- Spinner End --}}
	@if (route('contactUs'))
		@include('home.layouts.topbar')
	@endif
	{{-- Navbar Start --}}
	@include('home.layouts.header')
	{{-- Navbar End --}}

	@yield('content')
	@if (route('login') || route('register'))
	@else
		@include('home.layouts.footer')
	@endif

	<!-- JavaScript Libraries -->
	<script src="{{ asset('dist/js/home-page/wow.min.js') }}"></script>
	<script src="{{ asset('dist/js/home-page/easing.min.js') }}"></script>
	<script src="{{ asset('dist/js/home-page/waypoints.min.js') }}"></script>
	<script src="{{ asset('dist/js/home-page/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('dist/js/home-page/counterup.min.js') }}"></script>
	<script src="{{ asset('dist/js/home-page/main.js') }}"></script>
</body>

</html>

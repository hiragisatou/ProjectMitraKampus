<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	{{-- <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}"> --}}
	<script src="https://kit.fontawesome.com/6787aab0d7.js" crossorigin="anonymous"></script>
	<link id="pagestyle" rel="stylesheet" href="{{ asset('dist/css/admin-page/soft-ui-dashboard.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/select2-bootstrap-5-theme.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/style.css') }}">

	<script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('dist/js/datatables.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/soft-ui-plugins_datatables.js') }}"></script>
	<script src="{{ asset('dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('dist/js/admin-page/chartjs.min.js') }}"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
	@if (session()->has('success'))
		<input type="hidden" value="{{ session('success') }}" id="notification-toast-success">
	@endif
	@if (session()->has('error'))
		<input type="hidden" value="{{ session('error') }}" id="notification-toast-error">
	@endif
	@include('admin.layouts.sidebar')
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="max-width: 95%">
		@include('admin.layouts.header')
		<div class="container-fluid py-4" style="min-height: 80vh">
			@yield('content')
		</div>
		<div class="container-fluid">
			@include('admin.layouts.footer')
		</div>
	</main>

	<!--   Core JS Files   -->
	<script src="{{ asset('dist/js/admin-page/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/smooth-scrollbar.min.js') }}"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<script src="{{ asset('dist/js/admin-page/soft-ui-dashboard.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/admin.js') }}"></script>
</body>

</html>

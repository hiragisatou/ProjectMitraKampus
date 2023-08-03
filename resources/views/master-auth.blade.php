<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
	<script src="{{ asset('dist/js/all.min.js') }}"></script>

	<!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}">
	<link id="pagestyle" href="{{ asset('dist/css/soft-ui-dashboard.min.css') }}" rel="stylesheet" />

	<!-- Script Files -->
	<!-- Core -->
	<script src="{{ asset('dist/js/popper.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('dist/js/jquery_3.7.0.min.js') }}"></script>
	<script src="{{ asset('dist/js/validation/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('dist/js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>

</head>

<body class="g-sidenav-show  bg-gray-100">
	@yield('content')

	<!-- Theme JS -->

	<script src="{{ asset('dist/js/soft-ui-dashboard.min.js') }}"></script>
</body>

</html>

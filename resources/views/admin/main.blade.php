<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>

	<!-- ========== All CSS files linkup ========= -->
	<script src="https://kit.fontawesome.com/6787aab0d7.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/select2-bootstrap-5-theme.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/lineicons.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/materialdesignicons.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/fullcalendar.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/main.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/datatables.min.css') }}" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

	<script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('dist/js/datatables.min.js') }}"></script>
	<script src="{{ asset('dist/js/select2.min.js') }}"></script>
</head>

<body>
	@include('admin.layouts.sidebar')
	<main class="main-wrapper">
		@include('admin.layouts.header')
		@if (session()->has('success'))
			<input type="hidden" value="{{ session('success') }}" id="notification-toast">
		@endif
		<section class="section">
			<div class="container-fluid">
				<!-- ========== title-wrapper start ========== -->
				<div class="title-wrapper pt-30">
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="title mb-30">
								<h2>@yield('judul')</h2>
							</div>
						</div>
						<!-- end col -->
						<div class="col-md-6">
							<div class="d-flex justify-content-end">
                                <a class="btn btn-secondary" href="{{ url()->previous() }}">
                                    <span class="me-2">
                                        <svg class="ikon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                                    </span>
                                    Back
                                </a>
                            </div>
						</div>
						<!-- end col -->
					</div>
					<!-- end row -->
				</div>
				<!-- ========== title-wrapper end ========== -->
				@yield('content')
			</div>
		</section>
		@include('admin.layouts.footer')
	</main>

	<!-- ========= All Javascript files linkup ======== -->

	<script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/Chart.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/dynamic-pie-chart.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/moment.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/fullcalendar.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/jvectormap.min.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/world-merc.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/polyfill.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/main.js') }}"></script>
	<script src="{{ asset('dist/js/admin-page/admin.js') }}"></script>
</body>

</html>

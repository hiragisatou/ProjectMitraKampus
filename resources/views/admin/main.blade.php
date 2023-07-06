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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/lineicons.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/materialdesignicons.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/fullcalendar.css') }}" />
	<link rel="stylesheet" href="{{ asset('dist/css/admin-page/main.css') }}" />
</head>

<body>
	@include('admin.layouts.sidebar')
	<main class="main-wrapper">
		@include('admin.layouts.header')
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
							<div class="breadcrumb-wrapper mb-30">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="#0">Dashboard</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											eCommerce
										</li>
									</ol>
								</nav>
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
    <script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>
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

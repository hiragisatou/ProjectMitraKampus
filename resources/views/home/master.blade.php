<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
		@yield('title') - Sistem Pengajuan MoU dan MoA
	</title>
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/6787aab0d7.js" crossorigin="anonymous"></script>
	<!-- CSS Files -->
	<link id="pagestyle" href="{{ asset('dist/css/admin-page/soft-ui-dashboard.min.css') }}" rel="stylesheet" />
</head>

<body class="">
	@include('home.layouts.header')

    <main class="main-content mt-7">
        <section class="mb-8" style="min-height: 50vh">
            @yield('content')
        </section>
    </main>

	@include('home.layouts.footer')
	<!--   Core JS Files   -->
	<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>

    <script src="https://kit.fontawesome.com/6787aab0d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/home-page/style.css') }}">
    <script src="{{ asset('dist/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
	@include('home.layouts.header')
    <div class="my-5">
        @yield('content')
    </div>
    @include('home.layouts.footer')
</body>

</html>

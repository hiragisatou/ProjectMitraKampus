<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('dist/css/libs.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/hope-ui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('dist/css/custom.min.css') }}">
</head>
<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    @yield('content')

    <script src="{{ asset('dist/js/libs.min.js') }}"></script>
	<script src="{{ asset('dist/js/hope-ui.js') }}"></script>
</body>
</html>

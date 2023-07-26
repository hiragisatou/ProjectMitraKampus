@extends('home.master')
@section('title', 'About Us')
@section('content')
	<div class="px-4 py-5 my-5 text-center">
		<svg class="d-block mx-auto mb-4 ikon-svg" width="72" height="57" role="img" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
			<path d="M288 0H400c8.8 0 16 7.2 16 16V80c0 8.8-7.2 16-16 16H320.7l89.6 64H512c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H336V400c0-26.5-21.5-48-48-48s-48 21.5-48 48V512H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64H165.7L256 95.5V32c0-17.7 14.3-32 32-32zm48 240a48 48 0 1 0 -96 0 48 48 0 1 0 96 0zM80 224c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H80zm368 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H464c-8.8 0-16 7.2-16 16zM80 352c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H80zm384 0c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H464z" />
		</svg>
		{{-- <img class="d-block mx-auto mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
		<h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1>
		<div class="col-lg-6 mx-auto">
			<p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
			<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
				<a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 gap-3">Daftar</a>
				<a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4">Masuk</a>
			</div>
		</div>
	</div>
@endsection

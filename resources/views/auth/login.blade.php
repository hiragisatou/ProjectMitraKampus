@extends('home.master')
@section('title', 'Login Page')
@section('content')
	<div class="container wow fadeIn" data-wow-delay="0.1s">
		<div class="card position-absolute top-50 start-50 translate-middle w-25">
			<div class="card-header">
				<h2 class="text-center">Login</h2>
				<div class="text-center">
					<span>Belum punya akun?</span> <a href="{{ route('register') }}">Daftar</a>
				</div>
			</div>
			<div class="card-body">
				<form action="{{ route('loginHandler') }}" method="post">
					@csrf
					<div class="form-floating mb-3">
						<input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								Ingat saya
							</label>
						</div>
						<a href="{{ route('password.request') }}">Lupa Password?</a>
					</div>
					<button type="submit" class="btn btn-primary w-100">Submit</button>
				</form>
				@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}">
						{{ __('Forgot Your Password?') }}
					</a>
				@endif
			</div>
		</div>
	</div>
@endsection

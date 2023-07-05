@extends('home.master')
@section('title', 'Register Page')
@section('content')

<div class="container wow fadeIn d-flex justify-content-center align-items-center" data-wow-delay="0.1s">
    <div class="card w-50">
        <div class="card-header">
            <h2 class="text-center">BUAT AKUN</h2>
            <div class="text-center">
                <span>Sudah punya akun?</span> <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('registerHandler') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="customCheck1">
                            <label class="form-check-label" for="customCheck1">I agree with the terms of use</label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

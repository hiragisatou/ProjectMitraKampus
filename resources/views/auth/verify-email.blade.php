@extends('home.master')
@section('title', 'Verifying Email')
@section('content')
	<div class="container-fluid p-3">
		@if (session('message'))
			<div class="alert alert-success" role="alert">
				{{ __('Link baru verifikasi berhasil dikirim!') }}
			</div>
		@endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Verify Email</h4>
                <p class="card-text mb-3">Link verifikasi email telah dikirimkan ke email anda. Silahkan lihat email anda dan klik link verfikasi email untuk melanjutkan.</p>
                <form action="{{ route('verification.send') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Kirim ulang verifikasi email!</button>
                </form>
            </div>
        </div>
	</div>
@endsection

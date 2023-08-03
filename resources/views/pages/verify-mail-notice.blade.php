<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Verifikasi Email</title>


	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
	<script src="{{ asset('dist/js/all.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('dist/css/soft-ui-dashboard.min.css') }}">
</head>

<body>
	<div class="container d-flex justify-content-center align-content-center" style="height: 100vh">
		<div class="my-auto">
            @if (session()->has('message'))
                <div class="alert alert-success mb-3 d-flex justify-content-center">
                    <span class="text-uppercase text-center text-white text-bold">{{ session('message') }}</span>
                </div>
            @endif
			<div class="card">
				<div class="card-body">
					<h1 class="text-center"><i class="fa-solid fa-truck-fast"></i></h1>
					<h4 class="text-center">Check email anda</h4>
					<span class="text-center">Kami telah mengirim link verifikasi ke</span>
					<strong>{{ auth()->user()->email }}</strong>
					<div class="mt-3">
                        <span class="text-center">Apabila anda belum menerima email kami, silahkan klik link dibawah.</span>
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary w-100 mt-3 mb-4"><span class="me-2"><i class="fa-regular fa-paper-plane"></i></span>Kirim link verifikasi</button>
                        </form>

                    </div>
                    <form action="{{ route('logout_handler') }}" method="post">
                        @csrf
                        <button class="border-0 m-0 p-0 w-100 bg-transparent text-info"><span class="me-2"><i class="fa-solid fa-arrow-left"></i></span>Kembali ke halaman login</button>
                    </form>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('dist/js/soft-ui-dashboard.min.js') }}"></script>
</body>

</html>

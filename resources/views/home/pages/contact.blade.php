@extends('home.master')
@section('title', 'About Us')
@section('content')
	<div class="container">
		<div class="d-flex justify-content-center mb-5">
			<h1>Contact</h1>
		</div>
        <div class="d-flex justify-content-center">
            <div class="card border-0 w-50">
                <div class="card-body justify-content-center">
                    <form action="" method="get">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
                                    <label for="nama">Nama</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Ketikkan pesan disini" id="pesan" style="height: 100px"></textarea>
                            <label for="pesan">Pesan</label>
                        </div>
                        <div class="d-flex justify-content-center"></div>
                        <button type="submit" class="btn btn-dark w-100">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
@endsection

@extends('home.master')
@section('title', 'Profil Mitra')
@section('content')

	<div class="container wow fadeIn d-flex justify-content-center align-items-center" data-wow-delay="0.1s">
		<div class="card w-75">
			<div class="card-header">
				<h2 class="">Lengkapi Profile Perusahaan</h2>
			</div>
			<form method="POST" action="{{ route('profileHandler') }}">
				<div class="card-body">
					@csrf
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nama Perusahaan</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kode</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nomor Induk Perusahaan</label>
						<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kriteria Mitra</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Open this select menu</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Sektor Industri</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Open this select menu</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Sifat Mitra</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Open this select menu</option>
							<option value="1">Nasional</option>
							<option value="2">Internasional</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Jenis Mitra</label>
						<select class="form-select" aria-label="Default select example">
							<option selected>Open this select menu</option>
							<option value="1">Pemerintahan</option>
							<option value="2">Dudi</option>
							<option value="3">Sekolah</option>
							<option value="3">Perguruan Tinggi</option>
							<option value="3">Organisasi</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Klasifikasi</label>
						<select class="form-select" aria-label="Default select example" name="klasifikasi">
							<option selected>Open this select menu</option>
							<option value="1">Besar</option>
							<option value="2">Menengah</option>
							<option value="3">Kecil</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Jumlah Pegawai</label>
						<input type="number" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Alamat</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Provinsi</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kabupaten</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Kecamatan</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Url Web</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
					</div>
					<div class="row">
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Linkedin</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Instagram</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Facebook</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Twitter</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Tiktok</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="exampleFormControlInput1" class="form-label">Youtube</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
						</div>
					</div>
				</div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary w-25">Simpan</button>
                    </div>
                </div>
			</form>
		</div>
	</div>
@endsection

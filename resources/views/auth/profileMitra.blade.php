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
						<label for="nama" class="form-label">Nama Mitra</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="">
					</div>
					<div class="mb-3">
						<label for="NIP" class="form-label">Nomor Induk Berusaha</label>
						<input type="number" class="form-control" id="NIP" name="nip" placeholder="">
					</div>
					<div class="mb-3">
						<label for="kriteria" class="form-label">Kriteria Mitra</label>
						<select class="form-select" name="kriteria" id="kriteria">
							<option selected>-- Pilih Kriteria Mitra --</option>
							@foreach ($kriteria as $x)
								<option value="{{ $x['id'] }}">{{ $x['kriteria'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sektor Industri</label>
						<select class="form-select" name="sektor">
							<option selected>-- Pilih Sektor Industri --</option>
                            @foreach ($sektor as $x)
                            <option value="{{ $x['id'] }}">{{ $x['sektor'] }}</option>
                            @endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sifat Mitra</label>
						<select class="form-select" name="sifat">
							<option selected>-- Pilih Sifat Mitra --</option>
							@foreach ($sifat as $x)
                            <option value="{{ $x['id'] }}">{{ $x['kategori'] }}</option>
                            @endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Mitra</label>
						<select class="form-select" name="jenis">
							<option selected>-- Pilih Jenis Mitra --</option>
							@foreach ($jenis as $x)
								<option value="{{ $x['id'] }}">{{ $x['jenis'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Klasifikasi</label>
						<select class="form-select" name="klasifikasi">
							<option selected>-- Pilih Klasifikasi Mitra --</option>
							<option value="1">Besar</option>
							<option value="2">Menengah</option>
							<option value="3">Kecil</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="jumlah_pegawai" class="form-label">Jumlah Pegawai</label>
						<input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" placeholder="">
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
					</div>
					<div class="mb-3">
						<label for="provinsi" class="form-label">Provinsi</label>
						<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="">
					</div>
					<div class="mb-3">
						<label for="kabupaten" class="form-label">Kabupaten</label>
						<input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="">
					</div>
					<div class="mb-3">
						<label for="kecamatan" class="form-label">Kecamatan</label>
						<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="">
					</div>
					<div class="mb-3">
						<label for="url" class="form-label">Url Web</label>
						<input type="text" class="form-control" id="url" name="url" placeholder="">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="">
					</div>
					<div class="mb-3">
						<label for="notelp" class="form-label">Nomor Telepon</label>
						<input type="text" class="form-control" id="notelp" name="notelp" placeholder="">
					</div>
					<div class="row">
						<div class="mb-3 col-lg-6">
							<label for="linkedin" class="form-label">Linkedin</label>
							<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="instagram" class="form-label">Instagram</label>
							<input type="text" class="form-control" id="instagram" name="instagram" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="facebook" class="form-label">Facebook</label>
							<input type="text" class="form-control" id="facebook" name="facebook" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="twitter" class="form-label">Twitter</label>
							<input type="text" class="form-control" id="twitter" name="twitter" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="tiktok" class="form-label">Tiktok</label>
							<input type="text" class="form-control" id="tiktok" name="tiktok" placeholder="">
						</div>
						<div class="mb-3 col-lg-6">
							<label for="youtube" class="form-label">Youtube</label>
							<input type="text" class="form-control" id="youtube" name="youtube" placeholder="">
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

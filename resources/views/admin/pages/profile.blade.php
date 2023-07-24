@extends('admin.main')
@section('title', 'Edit Profile')
@section('judul', 'Edit Profile')
@section('content')
@dd($mitra)
	{{-- <div class="container-fluid"> --}}
	<form method="POST" action="{{ route('editProfileHandler') }}">
		@csrf
		<div class="row row-cols-2 mb-4">
			<div class="mb-3">
				<label for="nama" class="form-label">Nama Mitra</label>
				<input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ $mitra['nama'] }}" required>
			</div>
			<div class="mb-3">
				<label for="NIB" class="form-label">Nomor Induk Berusaha</label>
				<input type="number" class="form-control" id="NIB" name="nib" placeholder="" value="{{ $mitra['nomorIndukBerusaha'] }}" required>
			</div>
			<div class="mb-3">
				<label for="kriteria" class="form-label">Kriteria Mitra</label>
				<select class="form-select" name="kriteria" id="kriteria" required>
					<option selected>-- Pilih Kriteria Mitra --</option>
					@foreach ($kriteria as $x)
						<option {{ $x['id'] == $mitra['kriteriaMitra_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['kriteria'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Sektor Industri</label>
				<select class="form-select" name="sektor" required>
					<option selected>-- Pilih Sektor Industri --</option>
					@foreach ($sektor as $x)
						<option {{ $x['id'] == $mitra['sektorIndustri_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['sektor'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Sifat Mitra</label>
				<select class="form-select" name="sifat" required>
					<option selected>-- Pilih Sifat Mitra --</option>
					@foreach ($sifat as $x)
						<option {{ $x['id'] == $mitra['sifat_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['kategori'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Mitra</label>
				<select class="form-select" name="jenis" required>
					<option selected>-- Pilih Jenis Mitra --</option>
					@foreach ($jenis as $x)
						<option {{ $x['id'] == $mitra['jenis_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['jenis'] }}</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Klasifikasi</label>
				<select class="form-select" name="klasifikasi" required>
					<option selected>-- Pilih Klasifikasi Mitra --</option>
					<option {{ 'Besar' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Besar">Besar</option>
					<option {{ 'Menengah' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Menengah">Menengah</option>
					<option {{ 'Kecil' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Kecil">Kecil</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="jumlah_pegawai" class="form-label">Jumlah Pegawai</label>
				<input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" placeholder="" value="{{ $mitra['jumlahPegawai'] }}" required>
			</div>
			<div class="mb-3">
				<label for="alamat" class="form-label">Alamat</label>
				<input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $mitra['alamat'] }}" required>
			</div>
			<div class="mb-3">
				<label for="provinsi" class="form-label">Provinsi</label>
				<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="" value="{{ $mitra['provinsi'] }}" required>
			</div>
			<div class="mb-3">
				<label for="kabupaten" class="form-label">Kabupaten</label>
				<input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="" value="{{ $mitra['kabupaten'] }}" required>

			</div>
			<div class="mb-3">
				<label for="kecamatan" class="form-label">Kecamatan</label>
				<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="" value="{{ $mitra['kecamatan'] }}" required>
			</div>
			<div class="mb-3">
				<label for="url" class="form-label">Url Web</label>
				<input type="text" class="form-control" id="url" name="url" placeholder="" value="{{ $mitra['urlWeb'] }}">
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $mitra['email'] }}" required>
			</div>
			<div class="mb-3">
				<label for="notelp" class="form-label">Nomor Telepon</label>
				<input type="text" class="form-control" id="notelp" name="notelp" placeholder="" value="{{ $mitra['noTelp'] }}" required>
			</div>
		</div>
		<div class="row">
			<div class="mb-3 col-lg-6">
				<label for="linkedin" class="form-label">Linkedin</label>
				<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="" value="{{ $mitra['linkedin'] }}">
			</div>
			<div class="mb-3 col-lg-6">
				<label for="instagram" class="form-label">Instagram</label>
				<input type="text" class="form-control" id="instagram" name="instagram" placeholder="" value="{{ $mitra['instagram'] }}">
			</div>
			<div class="mb-3 col-lg-6">
				<label for="facebook" class="form-label">Facebook</label>
				<input type="text" class="form-control" id="facebook" name="facebook" placeholder="" value="{{ $mitra['facebook'] }}">
			</div>
			<div class="mb-3 col-lg-6">
				<label for="twitter" class="form-label">Twitter</label>
				<input type="text" class="form-control" id="twitter" name="twitter" placeholder="" value="{{ $mitra['twitter'] }}">
			</div>
			<div class="mb-3 col-lg-6">
				<label for="tiktok" class="form-label">Tiktok</label>
				<input type="text" class="form-control" id="tiktok" name="tiktok" placeholder="" value="{{ $mitra['tiktok'] }}">
			</div>
			<div class="mb-3 col-lg-6">
				<label for="youtube" class="form-label">Youtube</label>
				<input type="text" class="form-control" id="youtube" name="youtube" placeholder="" value="{{ $mitra['youtube'] }}">
			</div>
		</div>
		<div class="d-flex justify-content-end">
			<button type="submit" class="btn btn-primary w-25">Simpan</button>
		</div>
	</form>
	{{-- </div> --}}
	<script>
		$.ajax({
			url: "http://localhost:8000/api/alamatProvinsi",
			type: 'get',
			dataType: 'json',
			async: false,
			success: function(response) {

			},
			error: function(response) {
				console.log(response);
			}
		});
	</script>
@endsection

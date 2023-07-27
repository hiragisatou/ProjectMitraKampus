@extends('admin.main')
@section('title', 'Edit Profile')
@section('judul', 'Edit Profile')
@section('content')
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('editProfileHandler') }}">
				@csrf
				<div class="row row-cols-2 mb-4">
					<div class="mb-3">
						<label for="nama" class="form-label">Nama Mitra <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ $mitra['nama'] }}" required>
					</div>
					<div class="mb-3">
						<label for="NIB" class="form-label">Nomor Induk Berusaha <span class="text-danger">*</span></label>
						<input type="number" class="form-control" id="NIB" name="nib" placeholder="" value="{{ $mitra['nomorIndukBerusaha'] }}" required>
					</div>
					<div class="mb-3">
						<label for="kriteria" class="form-label">Kriteria Mitra <span class="text-danger">*</span></label>
						<select class="form-select" name="kriteria" id="kriteria" required>
							<option selected>-- Pilih Kriteria Mitra --</option>
							@foreach ($kriteria as $x)
								<option {{ $x['id'] == $mitra['kriteriaMitra_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['kriteria'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sektor Industri <span class="text-danger">*</span></label>
						<select class="form-select" name="sektor" required>
							<option selected>-- Pilih Sektor Industri --</option>
							@foreach ($sektor as $x)
								<option {{ $x['id'] == $mitra['sektorIndustri_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['sektor'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sifat Mitra <span class="text-danger">*</span></label>
						<select class="form-select" name="sifat" required>
							<option selected>-- Pilih Sifat Mitra --</option>
							@foreach ($sifat as $x)
								<option {{ $x['id'] == $mitra['sifat_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['kategori'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Mitra <span class="text-danger">*</span></label>
						<select class="form-select" name="jenis" required>
							<option selected>-- Pilih Jenis Mitra --</option>
							@foreach ($jenis as $x)
								<option {{ $x['id'] == $mitra['jenis_id'] ? 'selected' : '' }} value="{{ $x['id'] }}">{{ $x['jenis'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Klasifikasi <span class="text-danger">*</span></label>
						<select class="form-select" name="klasifikasi" required>
							<option selected>-- Pilih Klasifikasi Mitra --</option>
							<option {{ 'Besar' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Besar">Besar</option>
							<option {{ 'Menengah' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Menengah">Menengah</option>
							<option {{ 'Kecil' == $mitra['klasifikasi'] ? 'selected' : '' }} value="Kecil">Kecil</option>
						</select>
					</div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <select name="provinsi" id="provinsi" class="form-select" required>
                            <option value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $x)
                                <option value="{{ $x['id'] }}" {{ $x['id'] == $mitra['provinsi_id'] ? 'selected' : '' }}>{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
					<div class="mb-3">
						<label for="jumlah_pegawai" class="form-label">Jumlah Pegawai <span class="text-danger">*</span></label>
						<input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" placeholder="" value="{{ $mitra['jumlahPegawai'] }}" required>
					</div>
					<div class="mb-3">
						<label for="kabupaten" class="form-label">Kabupaten <span class="text-danger">*</span></label>
						<select name="kabupaten" id="kabupaten" class="form-select">
							@foreach ($kabupaten as $x)
								<option value="{{ $x['id'] }}" {{ $x['id'] == $mitra['kabupaten_id'] ? 'selected' : '' }}>{{ $x['nama'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="url" class="form-label">Url Web <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="url" name="url" placeholder="" value="{{ $mitra['urlWeb'] }}">
					</div>
					<div class="mb-3">
						<label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
						<select name="kecamatan" id="kecamatan" class="form-select">
							@foreach ($kecamatan as $x)
								<option value="{{ $x['id'] }}" {{ $x['id'] == $mitra['kecamatan_id'] ? 'selected' : '' }}>{{ $x['nama'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $mitra['email'] }}" required>
					</div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $mitra['alamat'] }}" required>
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
		</div>
	</div>
	<script>
        $(document).ready(function() {
            $('#breadcrumb > .active').remove();
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profil</li>');
			$('#provinsi').change(function(e) {
				if (this.value == '') {
					$("#kabupaten").children().remove().end();
					$("#kabupaten").attr('disabled', 'true');
				} else {
					$.getJSON("{{ route('api_kabupaten') }}", {
							'id': this.value
						},
						function(data, textStatus, jqXHR) {
							$("#kabupaten").children().remove().end();
							$("#kabupaten").removeAttr('disabled');
							$("#kabupaten").attr('required', 'true');
							$("#kabupaten").append(new Option("-- Pilih Kabupaten --", ""));
							data.forEach(element => {
								$("#kabupaten").append(new Option(element['nama'], element['id']));
							});
							$("#kecamatan").children().remove().end();
							$("#kecamatan").attr('disabled', 'true');
						}
					);
				}
			});
			$('#kabupaten').change(function(e) {
				$.getJSON("{{ route('api_kecamatan') }}", {
						'id': this.value
					},
					function(data, textStatus, jqXHR) {
						$("#kecamatan").children().remove().end();
						$("#kecamatan").removeAttr('disabled');
						$("#kecamatan").attr('required', 'true');
						$("#kecamatan").append(new Option("-- Pilih kecamatan --", ""));
						data.forEach(element => {
							$("#kecamatan").append(new Option(element['nama'], element['id']));
						});
					}
				);
			});
		});
	</script>
@endsection

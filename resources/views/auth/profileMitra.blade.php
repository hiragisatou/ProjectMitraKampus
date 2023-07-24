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
						<input type="text" class="form-control" id="nama" name="nama" placeholder="" required>
					</div>
					<div class="mb-3">
						<label for="NIB" class="form-label">Nomor Induk Berusaha</label>
						<input type="number" class="form-control" id="NIB" name="nib" placeholder="" required>
					</div>
					<div class="mb-3">
						<label for="kriteria" class="form-label">Kriteria Mitra</label>
						<select class="form-select" name="kriteria" id="kriteria" required>
							<option selected>-- Pilih Kriteria Mitra --</option>
							@foreach ($kriteria as $x)
								<option value="{{ $x['id'] }}">{{ $x['kriteria'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sektor Industri</label>
						<select class="form-select" name="sektor" required>
							<option selected>-- Pilih Sektor Industri --</option>
							@foreach ($sektor as $x)
								<option value="{{ $x['id'] }}">{{ $x['sektor'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sifat Mitra</label>
						<select class="form-select" name="sifat" required>
							<option selected>-- Pilih Sifat Mitra --</option>
							@foreach ($sifat as $x)
								<option value="{{ $x['id'] }}">{{ $x['kategori'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Mitra</label>
						<select class="form-select" name="jenis" required>
							<option selected>-- Pilih Jenis Mitra --</option>
							@foreach ($jenis as $x)
								<option value="{{ $x['id'] }}">{{ $x['jenis'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Klasifikasi</label>
						<select class="form-select" name="klasifikasi" required>
							<option selected>-- Pilih Klasifikasi Mitra --</option>
							<option value="1">Besar</option>
							<option value="2">Menengah</option>
							<option value="3">Kecil</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="jumlah_pegawai" class="form-label">Jumlah Pegawai</label>
						<input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" placeholder="" required>
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="" required>
					</div>
					<div class="mb-3">
						<label for="provinsi" class="form-label">Provinsi</label>
						<select name="provinsi" id="provinsi" class="form-select" required>
							<option value="">-- Pilih Provinsi --</option>
							@foreach ($provinsi as $x)
								<option value="{{ $x['id'] }}">{{ $x['nama'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="kabupaten" class="form-label">Kabupaten</label>
						<select name="kabupaten" id="kabupaten" class="form-select" disabled></select>
					</div>
					<div class="mb-3">
						<label for="kecamatan" class="form-label">Kecamatan</label>
						<select name="kecamatan" id="kecamatan" class="form-select" disabled></select>
					</div>
					<div class="mb-3">
						<label for="url" class="form-label">Url Web</label>
						<input type="text" class="form-control" id="url" name="url" placeholder="">
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="" required>
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
	<script>
		$(document).ready(function() {
			$('#provinsi').change(function(e) {
                if (this.value == '') {
                    $("#kabupaten").children().remove().end();
                        $("#kabupaten").attr('disabled', 'true');
                }
                else {
                    $.getJSON("{{ route('api_kabupaten') }}", {'id' : this.value},
                        function (data, textStatus, jqXHR) {
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
                $.getJSON("{{ route('api_kecamatan') }}", {'id' : this.value},
                    function (data, textStatus, jqXHR) {
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

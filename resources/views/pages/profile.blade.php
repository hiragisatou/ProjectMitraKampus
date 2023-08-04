@extends('master-dashboard')
@section('title', 'Profil Perusahaan')
@section('content')
	<div class="card">
		<div class="card-body">
			<form method="POST" action="{{ route('profile_handler') }}" id="form_profile" novalidate>
				@csrf
				<div class="row row-cols-2 mb-4">
					<div class="mb-3">
						<label for="name" class="form-label">Nama Mitra <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="name" name="name" value="@isset($mitra){{ $mitra['name'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="NIB" class="form-label">Nomor Induk Berusaha <span class="text-danger">*</span></label>
						<input type="number" class="form-control" id="nib" name="nib" value="@isset($mitra){{ $mitra['nib'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="kriteria" class="form-label">Kriteria Mitra <span class="text-danger">*</span></label>
						<select class="form-select select2" name="kriteria_mitra_id" id="kriteria_mitra_id">
							<option value=""></option>
							@foreach ($kriteria as $x)
								<option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['kriteria_mitra_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sektor Industri <span class="text-danger">*</span></label>
						<select class="form-select select2" name="sektor_industri_id" id="sektor_industri_id">
							<option value=""></option>
							@foreach ($sektor as $x)
								<option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['sektor_industri_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Sifat Mitra <span class="text-danger">*</span></label>
						<select class="form-select select2" name="sifat_mitra_id" id="sifat_mitra_id">
							<option value=""></option>
							@foreach ($sifat as $x)
								<option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['sifat_mitra_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Mitra <span class="text-danger">*</span></label>
						<select class="form-select select2" name="jenis_mitra_id" id="jenis_mitra_id">
							<option value=""></option>
							@foreach ($jenis as $x)
								<option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['jenis_mitra_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Klasifikasi <span class="text-danger">*</span></label>
						<select class="form-select select2" name="klasifikasi" id="klasifikasi">
							<option value=""></option>
							<option value="Besar" @isset($mitra) {{ $mitra['klasifikasi'] == 'Besar' ? 'selected' : '' }} @endisset>Besar</option>
							<option value="Menengah" @isset($mitra) {{ $mitra['klasifikasi'] == 'Menengah' ? 'selected' : '' }} @endisset>Menengah</option>
							<option value="Kecil" @isset($mitra) {{ $mitra['klasifikasi'] == 'Kecil' ? 'selected' : '' }} @endisset>Kecil</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
						<select name="provinsi" id="provinsi" class="form-select select2">
							<option value=""></option>
							@foreach ($provinsi as $x)
								<option value="{{ $x['id'] }}" @isset($mitra) {{ $mitra->kecamatan->kabupaten->provinsi_id == $x['id'] ? 'selected' : '' }} @endisset>{{ $x['name'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="jumlah_pegawai" class="form-label">Jumlah Pegawai <span class="text-danger">*</span></label>
						<input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" value="@isset($mitra){{ $mitra['jumlah_pegawai'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="kabupaten" class="form-label">Kabupaten <span class="text-danger">*</span></label>
						<select name="kabupaten" id="kabupaten" class="form-select select2">
							@isset($mitra)
								@foreach ($kabupaten as $x)
									<option value="{{ $x['id'] }}" {{ $mitra->kecamatan->kabupaten_id == $x['id'] ? 'selected' : '' }}>{{ $x['name'] }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<div class="mb-3">
						<label for="url" class="form-label">Url Web <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="url" name="url" value="@isset($mitra){{ $mitra['url'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
						<select name="kecamatan_id" id="kecamatan_id" class="form-select select2">
							@isset($mitra)
								@foreach ($kecamatan as $x)
									<option value="{{ $x['id'] }}" {{ $mitra['kecamatan_id'] == $x['id'] ? 'selected' : '' }}>{{ $x['name'] }}</option>
								@endforeach
							@endisset
						</select>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="email" name="email" value="@isset($mitra){{ $mitra['email'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="alamat" name="alamat" value="@isset($mitra){{ $mitra['alamat'] }}@endisset">
					</div>
					<div class="mb-3">
						<label for="notelp" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="no_telp" name="no_telp" value="@isset($mitra){{ $mitra['no_telp'] }}@endisset">
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col-lg-6">
						<label for="linkedin" class="form-label">Linkedin</label>
						<input type="text" class="form-control" id="linkedin" name="linkedin" value="@isset($mitra){{ $mitra['linkedin'] }}@endisset">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="instagram" class="form-label">Instagram</label>
						<input type="text" class="form-control" id="instagram" name="instagram" value="@isset($mitra){{ $mitra['instagram'] }}@endisset">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="facebook" class="form-label">Facebook</label>
						<input type="text" class="form-control" id="facebook" name="facebook" value="@isset($mitra){{ $mitra['facebook'] }}@endisset">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="twitter" class="form-label">Twitter</label>
						<input type="text" class="form-control" id="twitter" name="twitter" value="@isset($mitra){{ $mitra['twitter'] }}@endisset">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="tiktok" class="form-label">Tiktok</label>
						<input type="text" class="form-control" id="tiktok" name="tiktok" value="@isset($mitra){{ $mitra['tiktok'] }}@endisset">
					</div>
					<div class="mb-3 col-lg-6">
						<label for="youtube" class="form-label">Youtube</label>
						<input type="text" class="form-control" id="youtube" name="youtube" value="@isset($mitra){{ $mitra['youtube'] }}@endisset">
					</div>
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-info w-25"><span class="me-3"><i class="fa-regular fa-floppy-disk"></i></span>Simpan</button>
				</div>
			</form>
		</div>
	</div>
	<script>
		if (window.location.href == {{ Js::from(route('add_profile')) }}) {
			$('aside').remove();
			$('#kabupaten').attr('disabled', 'true');
			$('#kecamatan').attr('disabled', 'true');
		}
		$(document).ready(function() {
			$('.select2').select2({
				width: '100%',
				theme: 'bootstrap-5',
				placeholder: '-- Pilih salah satu --',
			});
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
								$("#kabupaten").append(new Option(element['name'], element['id']));
							});
							$("#kecamatan_id").children().remove().end();
							$("#kecamatan_id").attr('disabled', 'true');
						}
					);
				}
			});
			$('#kabupaten').change(function(e) {
				$.getJSON("{{ route('api_kecamatan') }}", {
						'id': this.value
					},
					function(data, textStatus, jqXHR) {
						$("#kecamatan_id").children().remove().end();
						$("#kecamatan_id").removeAttr('disabled');
						$("#kecamatan_id").attr('required', 'true');
						$("#kecamatan_id").append(new Option("-- Pilih kecamatan --", ""));
						data.forEach(element => {
							$("#kecamatan_id").append(new Option(element['name'], element['id']));
						});
					}
				);
			});

			$('#form_profile').validate({
				rules: {
					name: 'required',
					nib: 'required',
					kriteria_mitra_id: 'required',
                    sektor_industri_id: 'required',
                    sifat_mitra_id: 'required',
                    jenis_mitra_id: 'required',
                    klasifikasi: 'required',
                    provinsi: 'required',
                    kabupaten: 'required',
                    kecamatan_id: 'required',
                    alamat: 'required',
                    jumlah_pegawai: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    no_telp: 'required',

				},
				messages: {
                    name: 'Nama wajib diisi.',
					nib: 'Nomor induk perusahaan wajib diisi.',
					kriteria_mitra_id: 'Kriteria mitra wajib diisi.',
                    sektor_industri_id: 'Sektor industri wajib diisi.',
                    sifat_mitra_id: 'Sifat mitra wajib diisi.',
                    jenis_mitra_id: 'Jenis mitra wajib diisi.',
                    klasifikasi: 'Klasifikasi wajib diisi.',
                    provinsi: 'Provinsi wajib diisi.',
                    kabupaten: 'Kabupaten wajib diisi.',
                    kecamatan_id: 'Kecamatan wajib diisi.',
                    alamat: 'Alamat wajib diisi.',
                    jumlah_pegawai: 'Jumlah Pegawai wajib diisi.',
                    email: {
                        required: 'Email wajib diisi.',
                        email: 'Format email tidak sesuai'
                    },
                    no_telp: 'Nomor telepon wajib diisi.',
				},
				errorElement: "div",
				highlight: function(element, errorClass) {
					$(element).addClass("is-invalid");
				},
				unhighlight: function(element, errorClass) {
					$(element).removeClass("is-invalid");
				},
				errorPlacement: function(error, element) {
					error.addClass("invalid-feedback");
					if (element.attr("type") == "checkbox") {
						element.closest(".form-group").children(0).prepend(error);
					} else {
						error.insertAfter(element);
					}
				}
			});
		});
	</script>
@endsection

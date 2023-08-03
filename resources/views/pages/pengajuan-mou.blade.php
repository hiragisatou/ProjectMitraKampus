@extends('master-dashboard')
@section('title', 'Pengajuan Kemitraan')
@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-end">
				<a href="{{ asset('dist/file/Template MoU.docx') }}" class="btn btn-info">
					<span class="me-2"><i class="fa-solid fa-file-arrow-down"></i></span>
					Download Template MoU
				</a>
			</div>
			<div class="container-fluid">
				<form action="{{ route('pengajuan_mou_handler') }}" class="needs-validation" novalidate method="POST" enctype="multipart/form-data" id="formPengajuan">
					@csrf
					<div class="mb-3">
						<label class="form-label">Judul Kemitraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="name" id="name">
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Kemitraan <span class="text-danger">*</span></label>
						<select class="form-select" name="jenis_kemitraan" id="jenis_kemitraan" >
                            <option value=""></option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Ruang Lingkup <span class="text-danger">*</span></label>
						<select class="form-select" id="ruang_lingkup" name="ruang_lingkup[]" multiple="multiple">
							<option value="AL">Alabama</option>
							...
							<option value="WY">Wyoming</option>
							<option value="WY">Wyoming</option>
							<option value="WY">Wyoming</option>
							<option value="WY">Wyoming</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Program Studi <span class="text-danger">*</span></label>
						<select class="form-select" name="prodi_id" id="prodi_id">
							<option value=""></option>
                            @foreach ($prodi as $x)
                                <option value="{{ $x['id'] }}">{{ $x['name'] }}</option>
                            @endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
						<input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai">
					</div>
					<div class="mb-3">
						<label class="form-label">Keterangan <span class="text-danger">*</span></label>
						<textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Upload MoU <span class="text-danger">*</span></label>
						<input class="form-control" type="file" id="mou" name="mou" accept=".pdf">
					</div>
					<hr />
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-primary me-3 w-25">Ajukan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$('#ruang_lingkup').select2({
			width: '100%',
            placeholder: '-- Pilih Ruang Lingkup --',
		});
        $('#jenis_kemitraan').select2({
			width: '100%',
            theme: 'bootstrap-5',
            placeholder: '-- Pilih Jenis Kemitraan --',
		});
        $('#prodi_id').select2({
			width: '100%',
            theme: 'bootstrap-5',
            placeholder: '-- Pilih Program Studi --',
		});
		$(document).ready(function() {
			$('#formPengajuan').validate({
				rules: {
					name: 'required',
					jenis_kemitraan: {required: true},
					'ruang_lingkup[]': { required: true },
                    prodi_id: { required: true },
					tgl_mulai: 'required',
					keterangan: 'required',
					mou: {
						required: true,
						accept: 'pdf'
					}
				},
				messages: {
					name: 'Judul kemitraan wajib diisi.',
					jenis_kemitraan: { required: "Jenis kemitraan wajib diisi." },
					'ruang_lingkup[]': { required: "Ruang lingkup wajib diisi." },
                    prodi_id: { required: 'Prodi wajib diisi' },
					tgl_mulai: 'Tanggal mulai kerjasama wajib diisi',
					keterangan: 'Keterangan wajib diisi',
					mou: {
						required: 'MoU wajib diisi',
						accept: 'Type file MoU harus PDF'
					}
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
					} else
						error.insertAfter(element);
				}
			});
		});
	</script>
@endsection

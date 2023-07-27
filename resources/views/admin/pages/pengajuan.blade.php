@extends('admin.main')
@section('title', 'Pengajuan Kemitraan')
@section('judul', 'Pengajuan Kemitraan')
@section('content')
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-end">
				<a href="{{ asset('dist/TEMPLATE-DRAFT-PERJANJIAN-KERJA-SAMA-FAKULTAS.doc') }}" class="btn btn-info">
					<span class="me-2"><i class="fa-solid fa-file-arrow-down"></i></span>
					Download Template MoU
				</a>
			</div>
			<div class="container-fluid">
				<form action="{{ route('pengajuanMoUHandler') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label class="form-label">Judul Kemitraan <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="judul" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Kemitraan <span class="text-danger">*</span></label>
						<select class="form-select" name="jenis" required>
							<option selected>Open this select menu</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Ruang Lingkup <span class="text-danger">*</span></label>
						<select class="form-select" id="ruang-lingkup-mitra" name="lingkup[]" multiple="multiple" required>
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
						<select class="form-select" name="p_studi" required>
							<option>-- Pilih Program Studi --</option>
							@foreach ($prodi as $x)
								<option value="{{ $x['id'] }}">{{ $x['prodi'] }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
						<input type="date" class="form-control" name="tgl_mulai" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Keterangan <span class="text-danger">*</span></label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan" required></textarea>
					</div>
					<div class="mb-3">
						<label class="form-label">Upload MoU <span class="text-danger">*</span></label>
						<input class="form-control" type="file" id="formFile" name="mou" accept=".pdf" required>
					</div>
					<hr />
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-primary me-3 w-25">Ajukan</button>
						<a href="{{ url()->previous() }}" class="btn btn-secondary w-25">Batal</a>
					</div>
				</form>
			</div>

		</div>
	</div>
	<script>
		$('#ruang-lingkup-mitra').select2({
			width: '100%',
		});
	</script>
@endsection

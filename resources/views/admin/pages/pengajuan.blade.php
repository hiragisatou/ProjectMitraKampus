@extends('admin.main')
@section('title', 'Pengajuan Kemitraan')
@section('judul', 'Pengajuan Kemitraan')
@section('content')
	<div class="container-fluid">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Judul Kemitraan</label>
				<input type="text" class="form-control" placeholder="">
			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Kemitraan</label>
				<select class="form-select" aria-label="Default select example">
					<option selected>Open this select menu</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Ruang Lingkup</label>
				<select class="ruang-lingkup-mitra" name="states[]" multiple="multiple">
					<option value="AL">Alabama</option>
					...
					<option value="WY">Wyoming</option>
                    <option value="WY">Wyoming</option>
                    <option value="WY">Wyoming</option>
                    <option value="WY">Wyoming</option>
				</select>
			</div>
            <div class="mb-3">
				<label class="form-label">Program Study</label>
				<select class="form-select" aria-label="Default select example">
					<option selected>Open this select menu</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
            <div class="mb-3">
				<label class="form-label">Tanggal Mulai</label>
				<input type="date" class="form-control" placeholder="">
			</div>
            <div class="mb-3">
				<label class="form-label">Tanggal Selesai</label>
				<input type="date" class="form-control" placeholder="" disabled>
			</div>
            <div class="mb-3">
				<label class="form-label">Keterangan</label>
				<input type="date" class="form-control" placeholder="">
			</div>
            <hr/>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-3 w-25">Ajukan</button>
                <a href="" class="btn btn-secondary w-25">Batal</a>
            </div>
		</form>
	</div>
@endsection

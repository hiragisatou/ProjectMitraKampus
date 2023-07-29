@extends('admin.main')
@section('title', 'Detail Pengajuan Mitra ' . $data['mitra']['nama'])
@section('content')
	@if ($data['verify_pengajuan'] != null)
		@if ($data['verify_pengajuan']['status'] == 'Verify' || $data['verify_pengajuan']['status'] == 'Disetujui')
			<div class="alert alert-success">
				<span class="text-white bold">{{ $data['verify_pengajuan']['status'] }}</span>
			</div>
		@endif
		@if ($data['verify_pengajuan']['status'] == 'Ditolak')
			<div class="alert alert-danger" role="alert">
				<span class="text-white bold">{{ $data['verify_pengajuan']['status'] }} : {{ $data['verify_pengajuan']['keterangan'] }}</span>
			</div>
		@endif
	@endif
	@if ($data['verify_pengajuan'] == null)
		<div class="d-flex mt-3 justify-content-end">
			<button class="btn btn-icon btn-sm btn-success me-4" type="button" data-bs-toggle="modal" data-bs-target="#modalVerify" style="width: 10em">
				<span class="btn-inner--icon"><svg class="icon-fa-svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
						<path d="M96 80c0-26.5 21.5-48 48-48H432c26.5 0 48 21.5 48 48V384H96V80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48H64V416H512V288h16c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336z" />
					</svg></span>
				<span class="btn-inner--text">Verifikasi</span>
			</button>
			<button class="btn btn-icon btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalTolak" style="width: 10em">
				<span class="btn-inner--icon"><svg class="icon-fa-svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
						<path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
					</svg></span>
				<span class="btn-inner--text">Tolak</span>
			</button>
		</div>
	@endif
	<div class="card">
		<div class="card-body">
			<h6 class="font-weight-bolder mb-4">Data Kemitraan {{ $data['mitra']['nama'] }}</h6>
			<table class="table">
				<tbody class="align-items-center">
					<tr>
						<td class="col-lg-3 col-md-5">Judul Kemitraan</td>
						<td style="width: 5px">:</td>
						<td>{{ $data['judul'] }}</td>
					</tr>
					<tr>
						<td>Jenis Kemitraan</td>
						<td>:</td>
						<td>{{ $data['jenisKemitraan'] }}</td>
					</tr>
					<tr>
						<td>Nama Mitra</td>
						<td>:</td>
						<td>{{ $data['mitra']['nama'] }}</td>
					</tr>
					<tr>
						<td>Ruang Lingkup</td>
						<td>:</td>
						<td>
							<ul>
								@for ($i = 0; $i < count($data['ruangLingkup']); $i++)
									<li>
										{{ $data['ruangLingkup'][$i] }}
									</li>
								@endfor
							</ul>
						</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td>{{ date_format(date_create($data['tgl_mulai']), 'd-m-Y') }}</td>
					</tr>
					<tr>
						<td>Program Studi yang Melakukan Kemitraan / Kerja Sama</td>
						<td>:</td>
						<td>{{ $data['prodi']['prodi'] }}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td>{{ $data['keterangan'] }}</td>
					</tr>
					<tr>
						<td>Dokumen Terkait</td>
						<td>:</td>
						<td>
							<div class="row">
								<div class="col">
									<a class="btn btn-icon btn-sm btn-info" type="button" target="_blank" href="{{ asset('storage/' . $data['file_mou']) }}">
										<span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
										<span class="btn-inner--text">Usulan MoU</span>
									</a>
								</div>
								@if ($data['verify_pengajuan'] != null && $data['verify_pengajuan']['status'] == 'Verify')
									<div class="col">
										<a class="btn btn-icon btn-sm btn-success" type="button" target="_blank" href="{{ asset('storage/' . $data['verify_pengajuan']['valid_mou']) }}">
											<span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
											<span class="btn-inner--text">Valid MoU</span>
										</a>
									</div>
								@endif
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	@can('admin')
		@if ($data['verify_pengajuan'] == null)
			<!-- Modal Verify -->
			<div class="modal fade" id="modalVerify" tabindex="-1" role="dialog" aria-labelledby="modalVerifyLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body p-0">
							<div class="card card-plain">
								<div class="card-header pb-0 text-left">
									<h3 class="font-weight-bolder text-success text-gradient">Verifikasi</h3>
									<p class="mb-0">Kemitraan {{ $data['mitra']['nama'] }}</p>
								</div>
								<div class="card-body">
									<form role="form text-left" action="{{ route('VerifyMoU') }}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pengajuan" value="{{ $data['id'] }}">
                                        @csrf
										<label>Tanggal Berakhir Kerjasama <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<input type="date" class="form-control" name="tgl_akhir" required>
										</div>
										<label>File Kemitraan <span class="text-danger">*</span></label>
										<div class="input-group mb-3">
											<input class="form-control" type="file" id="file_verify" name="file_verify" accept=".pdf" required>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-round bg-gradient-success btn-lg w-100 mt-4 mb-0">Verifikasi</button>
										</div>
									</form>
								</div>
								<div class="card-footer text-center pt-0 px-lg-2 px-1">
									<p class="mb-4 text-sm mx-auto">
										Silahkan lengkapi form diatas!
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="modal fade" id="modalVerify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalVerifyLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="modalVerifyLabel">Verifikasi Kerjasama {{ $data['mitra']['nama'] }}</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('VerifyMoU') }}" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<p class="mb-1" style="font-size: 0.8em">Silahkan masukkan tanggal kerjasama berakhir dan berkas kerjasama.</p>
								@csrf
								<input type="hidden" name="id_pengajuan" value="{{ $data['id'] }}">
								<div class="mb-3">
									<label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
									<div class="col-sm-8">
										<input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="file_verify" class="col-sm-4 col-form-label">Berkas Kerjasama</label>
									<div class="col-sm-8">
										<input class="form-control" type="file" id="file_verify" name="file_verify" accept=".pdf" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-success">Verifikasi</button>
							</div>
						</form>
					</div>
				</div>
			</div> --}}
			<!-- Modal Tolak -->
			<div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="modalTolakLabel">Tolak Permintaan Kerjasama {{ $data['mitra']['nama'] }}</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('tolakMoU') }}" method="post">
							<div class="modal-body">
								<p class="mb-3">
									Apakah anda yakin menolak permintaan kerjasama {{ $data['judul'] }} dengan mitra {{ $data['mitra']['nama'] }} ?
								</p>
								<div class="mb-3">
									<label for="keterangan" class="form-label">Keterangan :</label>
									<textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
								@csrf
								<input type="hidden" value="{{ $data['id'] }}" name="id_pengajuan">
								<button type="submit" class="btn btn-danger">Tolak</button>
						</form>
					</div>
				</div>
			</div>
		@endif
	@endcan
	<script>
		var url = {{ Js::from(route('viewListPengajuan')) }}
		$('#breadcrumb > .active').remove();
		$('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + url + '">Daftar Pengajuan</a></li>');
		$('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
	</script>
@endsection

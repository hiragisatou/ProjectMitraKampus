@extends('admin.main')
@section('title', 'Detail Pengajuan Kemitraan')
@section('judul', 'Detail Pengajuan Kemitraan')
@section('content')
	@if ($data['verify_pengajuan'] != null)
		@if ($data['verify_pengajuan']['status'] == 'Verify' || $data['verify_pengajuan']['status'] == 'Disetujui')
			<div class="alert alert-success">
				Telah Disetujui
			</div>
		@endif
		@if ($data['verify_pengajuan']['status'] == 'Ditolak')
			<div class="alert alert-danger">
				Ditolak : {{ $data['verify_pengajuan']['keterangan'] }}
			</div>
		@endif
	@endif
	<div class="alert"></div>
	<div class="container-fluid">
		<table class="table table-striped">
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
							<div class="col"><a target="_blank" href="{{ asset('storage/' . $data['file_mou']) }}" class="btn btn-primary btn-sm p-1"><span class="me-2"><i class="lni lni-download"></i></span>Usulan MoU</a></div>
							@if ($data['verify_pengajuan'] != null && $data['verify_pengajuan']['status'] == 'Verify')
								<div class="col"><a target="_blank" href="{{ asset('storage/' . $data['verify_pengajuan']['valid_mou']) }}" class="btn btn-success btn-sm p-1"><span class="me-2"><i class="lni lni-download"></i></span>Valid MoU</a></div>
							@endif
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		@can('admin')
			@if ($data['verify_pengajuan'] == null)
				<div class="d-flex mt-5">
					<button class="btn btn-success me-4 d-flex justify-content-start align-items-center" data-bs-toggle="modal" data-bs-target="#modalVerify" style="width: 10em">
						<span style="font-size: 1.2em" class="d-inline-block">
							<svg class="ikon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
								<path d="M96 80c0-26.5 21.5-48 48-48H432c26.5 0 48 21.5 48 48V384H96V80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48H64V416H512V288h16c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336z" />
							</svg>
						</span>
						<span class="w-100 justify-content-between align-items-center">Verifikasi</span>
					</button>
					<button class="btn btn-danger me-4 d-flex justify-content-start align-items-center" data-bs-toggle="modal" data-bs-target="#modalTolak" style="width: 10em">
						<span style="font-size: 1.2em" class="d-inline-block">
							<svg class="ikon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
								<path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
							</svg>
						</span>
						<span class="w-100 justify-content-between align-items-center">Tolak</span>
					</button>
				</div>
			@endif
		@endcan
	</div>
	@can('admin')
		@if ($data['verify_pengajuan'] == null)
			<!-- Modal Verify -->
			<div class="modal fade" id="modalVerify" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalVerifyLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="modalVerifyLabel">Verifikasi Kerjasama {{ $data['mitra']['nama'] }}</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form action="{{ route('VerifyMoU') }}" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<p class="mb-10" style="font-size: 0.8em">Silahkan masukkan tanggal kerjasama berakhir dan berkas kerjasama.</p>
								@csrf
								<input type="hidden" name="id_pengajuan" value="{{ $data['id'] }}">
								<div class="mb-3 row">
									<label for="tgl_akhir" class="col-sm-4 col-form-label">Tanggal Akhir</label>
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
			</div>
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
@endsection

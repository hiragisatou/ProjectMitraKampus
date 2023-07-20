@extends('admin.main')
@section('title', 'Detail Pengajuan Kemitraan')
@section('judul', 'Detail Pengajuan Kemitraan')
@section('content')
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
					<td>{{ $data['ruangLingkup'] }}</td>
				</tr>
				<tr>
					<td>Tanggal Mulai</td>
					<td>:</td>
					<td>{{ $data['tgl_mulai'] }}</td>
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
							<div class="col"><a target="_blank" href="{{ asset('storage/' . $data['file_mou']) }}" class="btn btn-primary btn-sm p-1"><span class="me-2"><i class="lni lni-eye"></i></span>Usulan MoU</a></div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
        <div class="d-flex mt-5">
            <button class="btn btn-success me-4 d-flex justify-content-start align-items-center " style="width: 10em"> <span style="font-size: 1.2em" class="d-inline-block"><svg class="ikon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M96 80c0-26.5 21.5-48 48-48H432c26.5 0 48 21.5 48 48V384H96V80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48H64V416H512V288h16c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336z"/></svg></span><span class="w-100 justify-content-between align-items-center">Verifikasi</span></button>
            <button class="btn btn-danger me-4 d-flex justify-content-start align-items-center " style="width: 10em"> <span style="font-size: 1.2em" class="d-inline-block"><svg class="ikon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></span><span class="w-100 justify-content-between align-items-center">Tolak</span></button>
        </div>
	</div>
@endsection

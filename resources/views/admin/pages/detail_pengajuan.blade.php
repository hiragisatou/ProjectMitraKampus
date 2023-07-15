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
						<object data="{{ asset('storage/' . $data['file_mou']) }}" type="application/pdf" width="100%" height="500px">
							<a href="{{ asset('storage/' . $data['file_mou']) }}" class="btn btn-primary btn-sm p-1"><span class="me-2"><i class="lni lni-eye"></i></span>Lihat</a>
						</object>
                    </td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

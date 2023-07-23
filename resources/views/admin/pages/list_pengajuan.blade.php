@extends('admin.main')
@section('title', 'List Pengajuan Kemitraan')
@section('judul', 'List Pengajuan Kemitraan')
@section('content')
	<div class="container">
		<table class="table table-striped" id="list_pengajuan">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Jenis Kemitraan</th>
					<th>Prodi</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $x)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $x['judul'] }}</td>
						<td>{{ $x['jenisKemitraan'] }}</td>
						<td>{{ $x['prodi']['prodi'] }}</td>
						<td>{{ date_format(date_create($x['tgl_mulai']), 'd/m/Y') }} {{ $x['tgl_mulai'] == null ? '' : ' - ' . date_format(date_create($x['tgl_berakhir']), 'd/m/Y') }}</td>
						<td>
							@if ($x['verify_pengajuan'] != null)
								<span class="badge {{ $x['verify_pengajuan']['status'] == 'Verify' || $x['verify_pengajuan']['status'] == 'Disetujui' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $x['verify_pengajuan']['status'] }}</span>
							@else
								<span class="badge text-bg-secondary">Diproses</span>
							@endif
						</td>
						<td>
							<a href="{{ route('detailPengajuan', ['pengajuan' => $x['id']]) }}" class="btn btn-outline-dark">
								<span><i class="lni lni-magnifier"></i></span>
							</a>
							|
							<form action="{{ route('detailPengajuan', ['pengajuan' => $x['id']]) }}" method="post" class="d-inline">
								@method('delete')
								@csrf
								<button type="submit" class="btn btn-outline-danger"><i class="lni lni-trash-can"></i></button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<script>
		$(document).ready(function() {
			var myTable = $('#list_pengajuan').DataTable({});
		});
	</script>
@endsection

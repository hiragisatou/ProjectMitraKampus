@extends('admin.main')
@section('title', 'List Pengajuan Kemitraan')
@section('judul', 'List Pengajuan Kemitraan')
@section('content')
	<div class="card pt-3 px-4">
		<div class="table">
			<table class="table align-items-center mb-0" id="list_pengajuan">
				<thead>
					<tr>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">No</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama Mitra</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Judul</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Jenis Kemitraan</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Prodi</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Tanggal</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Status</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $x)
						<tr>
							<td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['mitra']['nama'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['judul'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['jenisKemitraan'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['prodi']['prodi'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ date_format(date_create($x['tgl_mulai']), 'd-m-Y') }} {{ $x['tgl_berakhir'] == null ? '' : ' s/d ' . date_format(date_create($x['tgl_berakhir']), 'd-m-Y') }}</td>
							<td>
								@if ($x['verify_pengajuan'] != null)
									<span class="badge badge-sm {{ $x['verify_pengajuan']['status'] == 'Verify' || $x['verify_pengajuan']['status'] == 'Disetujui' ? 'bg-gradient-danger' : 'bg-gradient-danger' }}">{{ $x['verify_pengajuan']['status'] }}</span>
								@else
									<span class="badge text-bg-secondary">Diproses</span>
								@endif
							</td>
							<td class="font-weight-bold mb-0 align-items-center">
								<a href="{{ route('detailPengajuan', ['pengajuan' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-2 px-3 m-0">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="icon-fa-svg">
											<path
												d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
										</svg>
									</span>
								</a>
								<form action="{{ route('detailPengajuan', ['pengajuan' => $x['id']]) }}" method="post" class="d-inline">
									@method('delete')
									@csrf
									<button type="submit" class="btn btn-outline-danger btn-sm py-2 px-3 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="icon-fa-svg">
											<path
												d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
										</svg>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
				</tfoot>
			</table>
		</div>
	</div>

	<script>
		var myTable = $('#list_pengajuan').DataTable({
			searching: false,
		});
		$(document).ready(function() {
			$('#header-search').on('keyup', function() {
				myTable.search(this.value).draw();
			});

			$('#list_pengajuan_paginate > ul').addClass('m-0');
			$('#list_pengajuan_previous > a').empty()
			$('#list_pengajuan_previous > a').append('<i class="fa fa-angle-left"></i>');
			$('#list_pengajuan_next > a').empty()
			$('#list_pengajuan_next > a').append('<i class="fa fa-angle-right"></i>');
			$('#list_pengajuan_paginate').addClass('d-flex justify-content-end')
			$('#list_pengajuan_info').parent().addClass('d-flex align-items-center');
			$('#list_pengajuan_info').addClass('text-sm');
			$('#list_pengajuan_length > label').addClass('d-flex-middle');;
			$('select[name="list_pengajuan_length"]').addClass('select-w-10');
			$('select[name="list_pengajuan_length"]').change(function(e) {
				$('#list_pengajuan_previous > a').empty()
				$('#list_pengajuan_previous > a').append('<i class="fa fa-angle-left"></i>');
				$('#list_pengajuan_next > a').empty()
				$('#list_pengajuan_next > a').append('<i class="fa fa-angle-right"></i>');
			});
		});
	</script>
@endsection

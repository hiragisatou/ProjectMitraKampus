@extends('master-dashboard')
@section('title', 'Daftar Pengajuan MoU')
@section('content')
	{{-- @dd($data) --}}
	<div class="card">
		<div class="card-body p-3">
			<table class="table align-items-center mb-0" id="list-pengajuan_mou">
				<thead>
					<tr>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">#</th>
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
							<td class="text-sm font-weight-bold mb-0">{{ $x['mitra']['name'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['name'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['jenis_kemitraan'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['prodi']['name'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ date_format(date_create($x['tgl_mulai']), 'd-m-Y') }} {{ $x['tgl_berakhir'] == null ? '' : ' s/d ' . date_format(date_create($x['tgl_berakhir']), 'd-m-Y') }}</td>
							<td class="text-sm font-weight-bold mb-0">
								@if ($x['verifymou'] != null)
									<span class="badge badge-sm {{ $x['verifymou']['status'] == 'verify' ? 'bg-gradient-success' : 'bg-gradient-danger' }}">{{ $x['verifymou']['status'] }}</span>
								@else
									<span class="badge text-bg-secondary">Diproses</span>
								@endif
							</td>
							<td class="text-sm font-weight-bold mb-0 align-items-center">
								<a href="{{ route('detail_pengajuan', ['mou' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-1 px-2 m-0">
									<i class="fa-regular fa-eye"></i>
								</a>
								{{-- <form action="{{ route('detail_pengajuan', ['mou' => $x['id']]) }}" method="post" class="d-inline">
									@method('delete')
									@csrf
									<button type="submit" class="btn btn-outline-danger btn-sm py-2 px-3 m-0">
										<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="icon-fa-svg">
											<path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
										</svg>
									</button>
								</form> --}}
                            </td>
						</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<script>
		var myTable = $('#list-pengajuan_mou').DataTable({
			initComplete: function() {
				this.api().columns().every(function() {
					let column = this;

					// Create select element
					let select = document.createElement('select');
					select.add(new Option(''));
					column.footer().replaceChildren(select);

					// Apply listener for user change in value
					select.addEventListener('change', function() {
						var val = DataTable.util.escapeRegex(select.value);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

					// Add list of options
					column.data().unique().sort().each(function(d, j) {
						select.add(new Option(d));
					});
				});
			},
		});

		$(document).ready(function() {
			$('td > select').addClass('form-select form-select-sm');
			$('tfoot > tr > td:first-child').empty();
			$('tfoot > tr > td:last-child').empty();
			$('tfoot > tr > td:nth-child(7) > select').empty();
			$('tfoot > tr > td:nth-child(7) > select').append(new Option("", ""));
			$('tfoot > tr > td:nth-child(7) > select').append(new Option("Verify", "Verify"));
			$('tfoot > tr > td:nth-child(7) > select').append(new Option("Tolak", "Tolak"));
			$('tfoot > tr > td:nth-child(7) > select').append(new Option("Diproses", "Diproses"));

			$('#list-pengajuan_mou_paginate > ul').addClass('m-0');
			$('#list-pengajuan_mou_paginate').addClass('d-flex justify-content-end')
			$('#list-pengajuan_mou_info').parent().addClass('d-flex align-items-center');
			$('#list-pengajuan_mou_info').addClass('text-sm');
			$('#list-pengajuan_mou_length > label').addClass('d-flex-middle');;
			$('select[name="list-pengajuan_mou_length"]').addClass('w-50');
		});
		const targetNode = document.getElementsByClassName("pagination")[0];

		// Options for the observer (which mutations to observe)
		const config = {
			attributes: true,
			childList: true,
		};

		// Callback function to execute when mutations are observed
		const callback = (mutationList, observer) => {
			$('#list-pengajuan_mou_previous > a').empty()
			$('#list-pengajuan_mou_previous > a').append('<i class="fa fa-angle-left"></i>');
			$('#list-pengajuan_mou_next > a').empty()
			$('#list-pengajuan_mou_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
		};

		// Create an observer instance linked to the callback function
		const observer = new MutationObserver(callback);

		// Start observing the target node for configured mutations
		observer.observe(targetNode, config);
	</script>
@endsection

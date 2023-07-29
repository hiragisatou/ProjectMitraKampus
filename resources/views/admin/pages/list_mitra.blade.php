@extends('admin.main')
@section('title', 'List Mitra')
@section('judul', 'List Mitra')
@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table" id="list_mitra">
				<thead>
					<tr>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">No</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Kriteria</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Kota</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Provinsi</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $x)
						<tr>
							<td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['nama'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['kriteria']['kriteria'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['kabupaten']['nama'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['provinsi']['nama'] }}</td>
							<td class="font-weight-bold mb-0 align-items-center">
								<a href="{{ route('detailMitra', ['mitra' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-2 px-3 m-0">
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="icon-fa-svg">
											<path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
										</svg>
									</span>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<script>
		var myTable = $('#list_mitra').DataTable({});
		$(document).ready(function() {
			$('#header-search').on('keyup', function() {
				myTable.search(this.value).draw();
			});

			$('#list_mitra_filter').css('visibility', 'hidden');
			$('#list_mitra_filter > label').addClass('d-flex-middle justify-content-end');
			$('#list_mitra_filter > label > input').css('width', '25%');
			$('#list_mitra_filter > label > input').addClass('ms-2  ');
			$('#list_mitra_paginate > ul').addClass('m-0');
			$('#list_mitra_previous > a').empty()
			$('#list_mitra_previous > a').append('<i class="fa fa-angle-left"></i>');
			$('#list_mitra_next > a').empty()
			$('#list_mitra_next > a').append('<i class="fa fa-angle-right"></i>');
			$('#list_mitra_paginate').addClass('d-flex justify-content-end')
			$('#list_mitra_info').parent().addClass('d-flex align-items-center');
			$('#list_mitra_info').addClass('text-sm');
			$('#list_mitra_length > label').addClass('d-flex-middle');;
			$('select[name="list_mitra_length"]').addClass('select-w-10');
            const targetNode = document.getElementsByClassName("pagination")[0];

            // Options for the observer (which mutations to observe)
            const config = {
                attributes: true,
                childList: true,
            };

            // Callback function to execute when mutations are observed
            const callback = (mutationList, observer) => {
                $('#list_mitra_previous > a').empty()
				$('#list_mitra_previous > a').append('<i class="fa fa-angle-left"></i>');
				$('#list_mitra_next > a').empty()
				$('#list_mitra_next > a').append('<i class="fa fa-angle-right"></i>');
            };

            // Create an observer instance linked to the callback function
            const observer = new MutationObserver(callback);

            // Start observing the target node for configured mutations
            observer.observe(targetNode, config);
		});
	</script>
@endsection

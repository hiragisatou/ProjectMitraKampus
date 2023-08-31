@extends('master-dashboard')
@section('title', 'Daftar Mitra')
@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table" id="list-mitra">
				<thead>
					<tr>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">No</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Kriteria</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Kota</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Provinsi</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="max-width: 50px">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $x)
						<tr>
							<td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['nama'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['kriteria'] == null ? '' : $x['kriteria']['nama'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['kabupaten'] == null ? '' : $x['kabupaten']['name'] }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['provinsi'] == null ? '' : $x['provinsi']['name'] }}</td>
							<td class="font-weight-bold mb-0 align-items-center">
								<a href="{{ route('detail_mitra', ['mitra' => $x['id']]) }}" class="btn btn-outline-dark btn-sm py-1 px-2 m-0">
									<i class="fa-regular fa-eye"></i>
								</a>
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
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<script>
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::from(route('dashboard')) }} + '">Dashboard</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Daftar Mitra</li>');

		var myTable = $('#list-mitra').DataTable({
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

			$('#list-mitra_paginate > ul').addClass('m-0');
			$('#list-mitra_paginate').addClass('d-flex justify-content-end')
			$('#list-mitra_info').parent().addClass('d-flex align-items-center');
			$('#list-mitra_info').addClass('text-sm');
			$('#list-mitra_length > label').addClass('d-flex-middle');;
			$('select[name="list-mitra_length"]').addClass('w-50');
		});
        const targetNode = document.getElementsByClassName("pagination")[0];

        // Options for the observer (which mutations to observe)
        const config = {
            attributes: true,
            childList: true,
        };

        // Callback function to execute when mutations are observed
        const callback = (mutationList, observer) => {
            $('#list-mitra_previous > a').empty()
            $('#list-mitra_previous > a').append('<i class="fa fa-angle-left"></i>');
            $('#list-mitra_next > a').empty()
            $('#list-mitra_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
        };

        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(callback);

        // Start observing the target node for configured mutations
        observer.observe(targetNode, config);
	</script>
@endsection

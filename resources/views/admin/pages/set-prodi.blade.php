@extends('admin.main')
@section('title', 'List Prodi')
@section('judul', 'List Prodi')
@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table" id="list_prodi">
				<thead>
					<tr>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">No</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama Program Studi</th>
						<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $x)
						<tr>
							<td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
							<td class="text-sm font-weight-bold mb-0">{{ $x['prodi'] }}</td>
							<td class="font-weight-bold mb-0 align-items-center">
								<button href="{{ route('detailMitra', ['mitra' => $x['id']]) }}" class="btn btn-outline-warning btn-sm py-2 px-3 m-0">
									<span>
										<i class="fa-regular fa-pen-to-square"></i>
									</span>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

    <div class="modal fade" id="modalProdi" tabindex="-1" role="dialog" aria-labelledby="modalProdiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-success text-gradient">Tambah Program Studi</h3>
                        </div>
                        <div class="card-body">
                            <form role="form text-left" action="{{ route('addProdi') }}" method="post">
                                <input type="hidden" name="id_pengajuan" value="">
                                @csrf
                                <label>Nama Program Studi <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="nama" required>
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
	<script>
		var myTable = $('#list_prodi').DataTable({});
		$(document).ready(function() {
			$('#header-search').on('keyup', function() {
				myTable.search(this.value).draw();
			});

			$('#list_prodi_filter').empty();
            $('#list_prodi_filter').addClass('d-flex justify-content-end');
            $('#list_prodi_filter').append('<button class="btn btn-icon btn-sm btn-success me-4" type="button" data-bs-toggle="modal" data-bs-target="#modalProdi"><span class="btn-inner--icon"><i class="fa-solid fa-plus"></i></span><span class="btn-inner--text"> Tambah Prodi</span></button>');
			$('#list_prodi_filter > label').addClass('d-flex-middle justify-content-end');
			$('#list_prodi_filter > label > input').css('width', '25%');
			$('#list_prodi_filter > label > input').addClass('ms-2  ');
			$('#list_prodi_paginate > ul').addClass('m-0');
			$('#list_prodi_previous > a').empty()
			$('#list_prodi_previous > a').append('<i class="fa fa-angle-left"></i>');
			$('#list_prodi_next > a').empty()
			$('#list_prodi_next > a').append('<i class="fa fa-angle-right"></i>');
			$('#list_prodi_paginate').addClass('d-flex justify-content-end')
			$('#list_prodi_info').parent().addClass('d-flex align-items-center');
			$('#list_prodi_info').addClass('text-sm');
			$('#list_prodi_length > label').addClass('d-flex-middle');;
			$('select[name="list_prodi_length"]').addClass('select-w-10');
            const targetNode = document.getElementsByClassName("pagination")[0];

            // Options for the observer (which mutations to observe)
            const config = {
                attributes: true,
                childList: true,
            };

            // Callback function to execute when mutations are observed
            const callback = (mutationList, observer) => {
                $('#list_prodi_previous > a').empty()
				$('#list_prodi_previous > a').append('<i class="fa fa-angle-left"></i>');
				$('#list_prodi_next > a').empty()
				$('#list_prodi_next > a').append('<i class="fa fa-angle-right"></i>');
            };

            // Create an observer instance linked to the callback function
            const observer = new MutationObserver(callback);

            // Start observing the target node for configured mutations
            observer.observe(targetNode, config);
		});
	</script>
@endsection

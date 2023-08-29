@extends('master-dashboard')
@section('title', 'Program Studi')
@section('content')
    <div class="card p-3">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#prodiModal">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span> Tambah Prodi
                </button>
            </div>
            <table class="table" id="prodi">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="width: 4em">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Program Studi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Jurusan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->name }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->jurusan()->exists() ? $x->jurusan->name : '' }}</td>
                            <td class="text-sm font-weight-bold mb-0">
                                <div class="d-flex">
                                    <button type="button" class="btn bg-gradient-warning me-1 my-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#editProdiModal" data-bs-id="{{ $x->id }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn bg-gradient-danger m-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#modal-notification" data-bs-url="{{ route('delete_prodi', ['prodi' => $x->id]) }}" data-bs-name="{{ $x->name }}"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="prodiModal" tabindex="-1" role="dialog" aria-labelledby="prodiModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prodiModalLabel">Tambah Program Studi</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('prodi_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <label for="jurusan" class="col-form-label">Jurusan</label>
                            <select name="jurusan_id" class="form-select">
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusan as $x)
                                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama Prodi</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editProdiModal" tabindex="-1" role="dialog" aria-labelledby="editProdiModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdiModalLabel">Edit Prodi</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('prodi_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="jurusan" class="col-form-label">Jurusan</label>
                            <select name="jurusan_id" class="form-select">
                                <option value="">Pilih Jurusan</option>
                                @foreach ($jurusan as $x)
                                    <option value="{{ $x->id }}">{{ $x->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama Prodi</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <span class="" style="font-size: 6rem"><i class="fa-regular fa-bell"></i></span>
                        <h4 class="text-gradient text-danger mt-4">Peringatan!</h4>
                        <p>Apakah anda yakin menghapus data ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="" method="post" class="m-0 p-0">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn bg-gradient-danger">Ya, Saya yakin</button>
                    </form>
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var myTable = $('#prodi ').DataTable({
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
            $('#breadcrumb').empty();
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page">Pengaturan</li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Program Studi</li>');
            $('td > select').addClass('form-select form-select-sm');
            $('tfoot > tr > td:first-child').empty();
            $('tfoot > tr > td:last-child').empty();

            $('#prodi_paginate > ul').addClass('m-0');
            $('#prodi_paginate').addClass('d-flex justify-content-end')
            $('#prodi_info').parent().addClass('d-flex align-items-center');
            $('#prodi_info').addClass('text-sm');
            $('#prodi_length > label').addClass('d-flex-middle');;
            $('select[name="prodi_length"]').addClass('w-50');

            $('#editProdiModal').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var prodi_id = button.getAttribute('data-bs-id');
                $.get({{ Js::from(route('data_prodi')) }}, {
                    id: prodi_id
                }, function(data, status) {
                    $('#editProdiModal').find('.modal-title').text('Edit Prodi ' + data['name']);
                    $('#editProdiModal').find('input[name="id"]').val(data['id']);
                    $('#editProdiModal').find('input[name="name"]').val(data['name']);
                    $('#editProdiModal').find('option[value="' + data['jurusan_id'] + '"]').attr('selected', 'true');
                });
            });

            $('#modal-notification').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var url = button.getAttribute('data-bs-url');
                var name = button.getAttribute('data-bs-name');
                $('#modal-notification').find('form').attr('action', url);
                $('#modal-notification').find('p:first').text("Apakah anda yakin menghapus program studi "+name+" ?")
            });

            $('#prodiModal').find('form').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
				rules: {
					jurusan_id: {
						required: true,
					},
					name: {
						required: true,
					}
				},
				messages: {
                    jurusan_id: {
						required: 'Jurusan wajib diisi',
					},
					name: {
						required: 'Nama prodi wajib diisi.',
					}
				},
				errorElement: "div",
				errorPlacement: function(error, element) {
					error.addClass("invalid-feedback");
					if (element.attr("type") == "checkbox") {
						element.closest(".form-group").children(0).prepend(error);
					} else {
						error.insertAfter(element);
					}
				}
			});
            $('#editProdiModal').find('form').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
				rules: {
					jurusan_id: {
						required: true,
					},
					name: {
						required: true,
					}
				},
				messages: {
                    jurusan_id: {
						required: 'Jurusan wajib diisi',
					},
					name: {
						required: 'Nama prodi wajib diisi.',
					}
				},
				errorElement: "div",
				errorPlacement: function(error, element) {
					error.addClass("invalid-feedback");
					if (element.attr("type") == "checkbox") {
						element.closest(".form-group").children(0).prepend(error);
					} else {
						error.insertAfter(element);
					}
				}
			});
        });

        const targetNode = document.getElementsByClassName("pagination")[0];

        // Options for the observer (which mutations to observe)
        const config = {
            attributes: true,
            childList: true,
        };

        // Callback function to execute when mutations are observed
        const callback = (mutationList, observer) => {
            $('#prodi_previous > a').empty()
            $('#prodi_previous > a').append('<i class="fa fa-angle-left"></i>');
            $('#prodi_next > a').empty()
            $('#prodi_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
        };

        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(callback);

        // Start observing the target node for configured mutations
        observer.observe(targetNode, config);
    </script>
@endsection

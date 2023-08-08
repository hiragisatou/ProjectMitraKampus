@extends('master-dashboard')
@section('title', 'Sektor Industri')
@section('content')
    <div class="card p-3">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span> Tambah Sektor Industri
                </button>
            </div>
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="width: 4em">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama Sektor Industri</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->name }}</td>
                            <td class="text-sm font-weight-bold mb-0">
                                <div class="d-flex">
                                    <button type="button" class="btn bg-gradient-warning me-1 my-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-all="{{ $x }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn bg-gradient-danger m-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#modal-notification" data-bs-url="{{ route('delete_sektor_industri', ['sektor' => $x->id]) }}" data-bs-name="{{ $x->name }}"><i class="fa-regular fa-trash-can"></i></button>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Sektor Industri</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('sektor_industri_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama Sektor</label>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('sektor_industri_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama Sektor</label>
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
        var myTable = $('#mytable ').DataTable({
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
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sektor Industri</li>');
            $('td > select').addClass('form-select form-select-sm');
            $('tfoot > tr > td:first-child').empty();
            $('tfoot > tr > td:last-child').empty();

            $('#mytable_paginate > ul').addClass('m-0');
            $('#mytable_paginate').addClass('d-flex justify-content-end')
            $('#mytable_info').parent().addClass('d-flex align-items-center');
            $('#mytable_info').addClass('text-sm');
            $('#mytable_length > label').addClass('d-flex-middle');;
            $('select[name="mytable_length"]').addClass('w-50');

            $('#editModal').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var data = JSON.parse(button.getAttribute('data-bs-all'));
                $('#editModal').find('.modal-title').text('Edit ' + data['name']);
                $('#editModal').find('input[name="id"]').val(data['id']);
                $('#editModal').find('input[name="name"]').val(data['name']);
            });

            $('#modal-notification').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var url = button.getAttribute('data-bs-url');
                var name = button.getAttribute('data-bs-name');
                $('#modal-notification').find('form').attr('action', url);
                $('#modal-notification').find('p:first').text("Apakah anda yakin menghapus sektor industri " + name + " ?")
            });

            $('#addModal').find('form').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: 'Nama sektor industri wajib diisi.',
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
            $('#editModal').find('form').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                rules: {
                    name: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: 'Nama sektor industri wajib diisi.',
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
            $('#mytable_previous > a').empty()
            $('#mytable_previous > a').append('<i class="fa fa-angle-left"></i>');
            $('#mytable_next > a').empty()
            $('#mytable_next > a').append('<i class="fa fa-angle-right"></i>');
            $('.paginate_button.page-item.active > a').addClass('text-white');
        };

        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(callback);

        // Start observing the target node for configured mutations
        observer.observe(targetNode, config);
    </script>
@endsection

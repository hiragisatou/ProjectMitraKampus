@extends('master-dashboard')
@section('title', 'Pengaturan User')
@section('content')
    <div class="card p-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="m-0 align-middle">Data User</h5>
                <button type="button" class="btn bg-gradient-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
                    <span class="me-2"><i class="fa-solid fa-plus"></i></span> Tambah User
                </button>
            </div>
            <table class="table" id="mytable">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="width: 4em">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nama User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Username</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Jenis User</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2" style="max-width: 50px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $x)
                        <tr>
                            <td class="text-sm font-weight-bold mb-0">{{ $loop->iteration }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->name }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->email }}</td>
                            <td class="text-sm font-weight-bold mb-0">{{ $x->role->name }}</td>
                            <td class="text-sm font-weight-bold mb-0">
                                <div class="d-flex">
                                    <button type="button" class="btn bg-gradient-warning me-1 my-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-all="{{ $x }}" data-bs-role="{{ $x->role->roleable }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button type="button" class="btn bg-gradient-danger m-0 py-1 px-2" data-bs-toggle="modal" data-bs-target="#modal-notification" data-bs-url="{{ route('delete_user', ['user' => $x->id]) }}" data-bs-name="{{ $x->name }}"><i class="fa-regular fa-trash-can"></i></button>
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
                    <h5 class="modal-title" id="addModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('user_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis User</label>
                            <select name="jenis_user" class="form-select">
                                <option value="">-- Pilih Jenis User --</option>
                                <option value="jurusan">Jurusan</option>
                                <option value="prodi">Program Studi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jurusan / Prodi</label>
                            <select name="role" class="form-select" disabled>
                            </select>
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
                <form action="{{ route('user_handler') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Nama</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Username</label>
                            <input type="text" name="username" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jenis User</label>
                            <select name="jenis_user" class="form-select">
                                <option value="">-- Pilih Jenis User --</option>
                                <option value="jurusan">Jurusan</option>
                                <option value="prodi">Program Studi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Jurusan / Prodi</label>
                            <select name="role" class="form-select">
                            </select>
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
        var j = {{ Js::from($jurusan) }};
        var p = {{ Js::from($prodi) }};

        $(document).ready(function() {
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><span class="opacity-5 text-dark">Pengaturan</span></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">User</li>');

            $('td > select').addClass('form-select form-select-sm');
            $('tfoot > tr > td:first-child').empty();
            $('tfoot > tr > td:last-child').empty();

            $('#mytable_paginate > ul').addClass('m-0');
            $('#mytable_paginate').addClass('d-flex justify-content-end')
            $('#mytable_info').parent().addClass('d-flex align-items-center');
            $('#mytable_info').addClass('text-sm');
            $('#mytable_length > label').addClass('d-flex-middle');;
            $('select[name="mytable_length"]').addClass('w-50');

            $('select[name="jenis_user"]').change(function(e) {
                if (this.value == "") {
                    $('select[name="role"]').attr('disabled', 'true');
                    $('select[name="role"]').empty();
                } else {
                    $('select[name="role"]').removeAttr('disabled');
                    if (this.value == 'jurusan') {
                        $('select[name="role"]').empty();
                        $('select[name="role"]').append(new Option('-- Pilih Jurusan --', ""));
                        j.forEach(e => {
                            $('select[name="role"]').append(new Option(e.nama, e.id));
                        });
                    } else {
                        $('select[name="role"]').empty();
                        $('select[name="role"]').append(new Option('-- Pilih Program Studi --', ""));
                        p.forEach(e => {
                            $('select[name="role"]').append(new Option(e.nama, e.id));
                        });
                    }
                }
            });

            $('#addModal').on('show.bs.modal', event => {
                if ($('#addModal').find('select[name="jenis_user"]').val() == "") {
                    $('#addModal').find('select[name="role"]').empty();
                    $('#addModal').find('select[name="role"]').attr('disabled', 'true');
                }
            });
            $('#editModal').on('show.bs.modal', event => {
                $('#editModal').find('input[name="password"]').val('');
                $('#editModal').find('input').removeClass('is-valid');
                $('#editModal').find('.invalid-feedback').remove();
                const button = event.relatedTarget
                var data = JSON.parse(button.getAttribute('data-bs-all'));
                var role = JSON.parse(button.getAttribute('data-bs-role'));
                console.log(data);
                $('#editModal').find('.modal-title').text('Edit User' + data['name']);
                $('#editModal').find('input[name="id"]').val(data['id']);
                $('#editModal').find('input[name="name"]').val(data['name']);
                $('#editModal').find('input[name="username"]').val(data['email']);
                $('#editModal').find('select[name="jenis_user"]').find('option[value="' + data['role']['name'] + '"]').attr('selected', 'true');
                if ($('#editModal').find('select[name="role"]').attr('disabled') !== undefined) {
                    $('#editModal').find('select[name="role"]').removeAttr('disabled');
                }
                if (data['role']['name'] == 'jurusan') {
                    $('#editModal').find('select[name="role"]').append(new Option('-- Pilih Jurusan --', ''));
                    j.forEach(e => {
                        $('#editModal').find('select[name="role"]').append(new Option(e.nama, e.id));
                    });
                } else {
                    $('#editModal').find('select[name="role"]').append(new Option('-- Pilih Prodi --', ''));
                    p.forEach(e => {
                        $('#editModal').find('select[name="role"]').append(new Option(e.nama, e.id));
                    });
                }
                $('#editModal').find('select[name="role"]').find('option[value="' + role.id + '"]').attr('selected', 'true');
            });

            $('#modal-notification').on('show.bs.modal', event => {
                const button = event.relatedTarget
                var url = button.getAttribute('data-bs-url');
                var name = button.getAttribute('data-bs-name');
                $('#modal-notification').find('form').attr('action', url);
                $('#modal-notification').find('p:first').text("Apakah anda yakin menghapus user " + name + " ?")
            });

            $('#addModal').find('form').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                rules: {
                    name: 'required',
                    username: {
                            required: true,
                            remote: {
                                url: checkMail,
                                type: 'post',
                                data: {
                                    '_token': function() {
                                        return $('input[name="_token"]').val();
                                    },
                                    'email': function() {
                                        return $('#email').val();
                                    }
                                }
                            }
                        },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    jenis_user: 'required',
                    role: 'required',
                },
                messages: {
                    name: 'Nama user wajib diisi.',
                    username: {
                        required: 'Username wajib diisi.',
                        remote: 'Username sudah terpakai.'
                    },
                    password: {
                        required: 'Password wajib diisi.',
                        minlength: 'Password minimal 8.'
                    },
                    jenis_user: 'Jenis User wajib diisi.',
                    role: 'Program Studi / Jurusan wajib diisi.',
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
                    name: 'required',
                    username: 'required',
                    password: {
                        minlength: 8
                    },
                    jenis_user: 'required',
                    role: 'required',
                },
                messages: {
                    name: 'Nama user wajib diisi.',
                    username: 'Username wajib diisi.',
                    password: {
                        minlength: 'Password minimal 8.'
                    },
                    jenis_user: 'Jenis User wajib diisi.',
                    role: 'Program Studi / Jurusan wajib diisi.',
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

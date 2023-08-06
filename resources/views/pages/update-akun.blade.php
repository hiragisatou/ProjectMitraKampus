@extends('master-dashboard')
@section('title', 'Pengaturan Akun')
@section('content')
    <div class="card p-3 col-lg-7 mx-auto">
        <div class="card-body">
            <form action="{{ route('update_account_handler') }}" method="POST" class="needs-validation" id="form_update-akun"
                novalidate>
                @csrf
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama <span class="text-danger">*</span></label>
                    <div class="col">
                        <input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail"
                        class="col-sm-2 col-form-label">{{ $data->role == 'mitra' ? 'Email' : 'Username' }}</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                            value="{{ $data->email }}" name="email">
                    </div>
                </div>
                <div class="mb-3 mt-3 row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="form-check form-switch col">
                        <input class="form-check-input" type="checkbox" role="switch" id="newPasswordSwitch">
                        <label class="form-check-label" for="newPasswordSwitch">Ubah Password</label>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col">
                        <input type="password" class="form-control" id="password" name="password" disabled>
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters.
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="confirm_password" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" disabled>
                    </div>
                </div>
                <div class="mb-3 mt-4 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password <span
                            class="text-danger">*</span></label>
                    <div class="col">
                        <input type="password" class="form-control  {{ session()->has('error') ? 'is-invalid' : '' }}"
                            id="old_password" name="old_password" required>
                        @if (session()->has('error'))
                            <div class="invalid-feedback">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end pe-2 mt-40">
                    <button type="submit" class="btn btn-info"><i class="fa-solid fa-floppy-disk"></i><span
                            class="ms-3 text-uppercase"> Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var checkPW = {{ Js::from(route('check_password_update', ['user' => $data->id])) }};
        $(document).ready(function() {
            $('#newPasswordSwitch').change(function() {
                if (this.value == "") {
                    $('#password').attr('disabled', true);
                    $('#confirm_password').attr('disabled', true);
                    $('#password').val('');
                    $('#confirm_password').val('');
                    $('#password').attr('required', false);
                    $('#confirm_password').attr('required', false);
                    this.value = "on";
                } else {
                    $('#password').attr('required', true);
                    $('#confirm_password').attr('required', true);
                    $('#password').attr('disabled', false);
                    $('#confirm_password').attr('disabled', false);
                    this.value = "";
                }
            });
            $('#form_update-akun').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                onfocusout: false,
                onkeyup: false,
                rules: {
                    name: 'required',
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {
                        required: true,
                        equalTo: '#password'
                    },
                    old_password: {
                        required: true,
                        remote: {
                            url: checkPW,
                            type: 'get',
                            data: {
                                '_token': function() {
                                    return $('input[name="_token"]').val();
                                },
                                'password': function() {
                                    return $('#old_password').val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    name: 'Nama wajib diisi',
                    password: {
                        required: 'Password baru wajib diisi',
                        minlength: 'Panjang password minimal 8'
                    },
                    confirm_password: {
                        required: 'Confirm Password wajib diisi',
                        equalTo: 'Confirm Password tidak sama dengan password.'
                    },
                    old_password: {
                        required: 'Password wajib diisi',
                        remote: 'Password tidak sesuai.'
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

            $('#breadcrumb').empty();
            $('#breadcrumb').append(
                '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengaturan Akun</li>');
        });
    </script>
@endsection

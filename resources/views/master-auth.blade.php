<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Login Page
    </title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
    <script src="{{ asset('dist/js/all.min.js') }}"></script>

    <link id="pagestyle" href="{{ asset('dist/css/soft-ui-dashboard.min.css') }}" rel="stylesheet" />
</head>

<body>
    @yield('content')
    @include('layouts.footer-home')

    <script src="{{ asset('dist/js/jquery_3.7.0.min.js') }}"></script>
    <script src="{{ asset('dist/js/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('dist/js/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    @if (url()->current() == route('login'))
        <script>
            $(document).ready(function() {
                $('#form_sign-in').validate({
                    validClass: "is-valid",
                    errorClass: "is-invalid",
                    rules: {
                        email: {
                            required: true,
                        },
                        password: {
                            required: true,
                            minlength: 8
                        }
                    },
                    messages: {
                        email: {
                            required: 'Email wajib diisi',
                        },
                        password: {
                            required: 'Password wajib diisi',
                            minlength: 'Panjang password minimal 8'
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
        </script>
    @endif
    @if (url()->current() == route('register'))
        <script>
            var checkMail = {{ Js::from(route('check_email_register')) }}
            $(document).ready(function() {
                $('#form_sign-up').validate({
                    validClass: "is-valid",
                    errorClass: "is-invalid",
                    rules: {
                        name: 'required',
                        email: {
                            required: true,
                            email: true,
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
                        confirm_password: {
                            required: true,
                            equalTo: '#password'
                        }
                    },
                    messages: {
                        name: 'Nama wajib diisi',
                        email: {
                            required: 'Email wajib diisi',
                            email: 'Email harus berupa alamat surel yang valid.',
                            remote: 'Email sudah terdaftar.'
                        },
                        password: {
                            required: 'Password wajib diisi',
                            minlength: 'Panjang password minimal 8'
                        },
                        confirm_password: {
                            required: 'Confirm Password wajib diisi',
                            equalTo: 'Password tidak sama.'
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
        </script>
    @endif
</body>

</html>

@extends('master-auth')
@section('title', 'Register Page')
@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
                Sistem Pengajuan MoU & MoA
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('home') }}">
                            <i class="fa fa-home opacity-6 me-1"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('aboutUs') }}">
                            <i class="fa fa-user opacity-6 me-1"></i>
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('contactUs') }}">
                            <i class="fa fa-address-book opacity-6 me-1"></i>
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('FAQ') }}">
                            <i class="fa fa-question-circle opacity-6 me-1"></i>
                            FAQ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('login') }}">
                            <i class="fas fa-key opacity-6 me-1"></i>
                            Sign In
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{ asset('dist/img/sign-up.jpg') }}');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                            <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h5>Register</h5>
                            </div>
                            <div class="card-body">
                                <form role="form text-left" novalidate action="{{ route('register_handler') }}" method="POST" id="form_sign-up">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon" name="name" id="name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" id="email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" id="password">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="confirm-password-addon" name="confirm_password" id="confirm_password">
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
    @endsection

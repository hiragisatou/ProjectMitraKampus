@extends('master-dashboard')
@section('title', 'Reset Password Request')
@section('content')
    <div class="card m-auto p-3" style="width: 40%">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success text-white" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-0">
                        <button type="submit" class="btn btn-primary">
                            Kirim link reset password
                        </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $('aside').remove();
        $('#breadcrumb').empty();
    </script>
@endsection

@extends('master-dashboard')
@section('title', 'Pengajuan MoA')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center">
                <div class="mx-auto">
                    <h1 class="text-center">
                        <i class="fa-regular fa-circle-xmark"></i>
                    </h1>
                    <p class="text-center">{{ $message }}</p>
                    <p class="text-center">Silahkan mengajukan MoU terlebih dahulu <a href="{{ route('pengajuan_mou') }}">disini</a>.</p>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::From(route('dashboard')) }} + '">Dashboard</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan MoA</li>');
        });
    </script>
@endsection

@extends('master-dashboard')
@section('title', 'Detail Kemitraan')
@section('content')
    {{-- @dd($data) --}}
    @if ($data['verifymou'] != null)
        @if ($data['verifymou']['status'] == 'verify')
            <div class="alert alert-success font-weight-bold text-white" role="alert">
                Disetujui
            </div>
        @endif
        @if ($data['verifymou']['status'] == 'tolak')
            <div class="alert alert-danger font-weight-bold text-white" role="alert">
                Ditolak : {{ $data['verifymou']['keterangan'] }}
            </div>
        @endif
    @endif
    <div class="card">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="font-weight-bolder">Detail Data MoU {{ $data['mitra']['nama'] }}</h6>
                @can('admin')
                    @if ($data['verifymou'] == null)
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-icon btn-sm btn-success me-4" type="button" data-bs-toggle="modal" data-bs-target="#modalVerify" style="width: 15em">
                                <span class="btn-inner--icon"><i class="fa-solid fa-check"></i></span>
                                <span class="btn-inner--text">Verifikasi</span>
                            </button>
                            <button class="btn btn-icon btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalTolak" style="width: 15em">
                                <span class="btn-inner--icon"><i class="fa-solid fa-xmark"></i></span>
                                <span class="btn-inner--text">Tolak</span>
                            </button>
                        </div>
                    @endif
                @endcan
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="col-lg-3 text-sm">Nomor MoU</td>
                        <td class="text-sm">: {{ $data['nomor'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Judul MoU</td>
                        <td class="text-sm">: {{ $data['judul'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Jenis Kemitraan</td>
                        <td class="text-sm">: {{ $data['jenis_kemitraan'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Nama Mitra</td>
                        <td class="text-sm">: {{ $data['mitra']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Ruang Lingkup</td>
                        <td class="text-sm d-flex">:
                            <ul>
                                @foreach (explode('+', $data['ruang_lingkup']) as $x)
                                    <li>{{ $x }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Tanggal Mulai</td>
                        <td class="text-sm">: {{ $data['tgl_mulai'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Tanggal Berakhir</td>
                        <td class="text-sm">: {{ $data['tgl_akhir'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Keterangan</td>
                        <td class="text-sm">: {{ $data['keterangan'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Dokumen terkait</td>
                        <td class="text-sm d-flex">:
                            <div class="row ms-1">
                                <div class="col">
                                    <a class="btn btn-icon btn-sm btn-info m-0" type="button" target="_blank" href="{{ asset('data/' . $data['mou_file']) }}">
                                        <span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
                                        <span class="btn-inner--text">Usulan MoU</span>
                                    </a>
                                </div>
                                @if ($data['verifymou'] != null && $data['verifymou']['status'] == 'verify')
                                    <div class="col">
                                        <a class="btn btn-icon btn-sm btn-success" type="button" target="_blank" href="{{ asset('data/' . $data['verifymou']['valid_mou_file']) }}">
                                            <span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
                                            <span class="btn-inner--text">Valid MoU</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @if ($data['verifymou'] != null)
                        <tr>
                            <td class="col-lg-3 text-sm">Diverifikasi oleh</td>
                            <td class="text-sm">: {{ $data['verifymou']['user']['name'] }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @can('admin')
        @if ($data['verifymou'] == null)
            <!-- Modal Verify -->
            <div class="modal fade" id="modalVerify" tabindex="-1" role="dialog" aria-labelledby="modalVerifyLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-success text-gradient">Verifikasi</h3>
                                    <p class="mb-0">Kemitraan {{ $data['mitra']['nama'] }}</p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" action="{{ route('verify_mou_handler') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="mou_id" value="{{ $data['id'] }}">
                                        <input type="hidden" name="status" id="status" value="verify">
                                        <label>Tanggal Berakhir Kerjasama <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" name="tgl_berakhir" required>
                                        </div>
                                        <label>File Kemitraan <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="file" name="valid_mou" accept=".pdf" required>
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
            <!-- Modal Tolak -->
            <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalTolakLabel">Tolak Permintaan Kerjasama {{ $data['mitra']['nama'] }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('verify_mou_handler') }}" method="post">
                            <div class="modal-body">
                                <p class="mb-3">
                                    Apakah anda yakin menolak permintaan kerjasama {{ $data['judul'] }} dengan mitra {{ $data['mitra']['nama'] }} ?
                                </p>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan :</label>
                                    <input type="hidden" name="mou_id" value="{{ $data['id'] }}">
                                    <input type="hidden" name="status" value="tolak">
                                    <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                @csrf
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endcan
    <script>
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::from(route('dashboard')) }} + '">Dashboard</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::from(route('view_list_mou')) }} + '">Daftar Pengajuan MoU</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
    </script>
@endsection

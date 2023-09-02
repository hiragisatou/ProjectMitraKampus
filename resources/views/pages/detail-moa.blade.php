@extends('master-dashboard')
@section('title', 'Detail MoA ' . $data->judul)
@section('content')
    {{-- @dd($data) --}}
    @if ($data['verifymoa'] != null)
        @canany(['admin', 'mitra'])
            @if ($data->verifymoa->status == null)
                <div class="alert alert-info font-weight-bold text-white" role="alert">
                    Moa diteruskan ke admin {{ $data->verifymoa->admin_type }}
                </div>
            @endif
        @endcanany
        @if ($data['verifymoa']['status'] == 'verify')
            <div class="alert alert-success font-weight-bold text-white" role="alert">
                Disetujui
            </div>
        @endif
        @if ($data['verifymoa']['status'] == 'tolak')
            <div class="alert alert-danger font-weight-bold text-white" role="alert">
                Ditolak : {{ $data['verifymoa']['keterangan'] }}
            </div>
        @endif
    @endif
    <div class="card">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="font-weight-bolder">Detail MoA {{ $data['judul'] }}</h6>
                @can('admin')
                    @if ($data['verifymoa'] == null)
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-icon btn-sm btn-success me-4" type="button" data-bs-toggle="modal" data-bs-target="#modalForward" style="width: 15em">
                                <span class="btn-inner--icon"><i class="fa-solid fa-check"></i></span>
                                <span class="btn-inner--text">Teruskan</span>
                            </button>
                            <button class="btn btn-icon btn-sm btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalTolak" style="width: 15em">
                                <span class="btn-inner--icon"><i class="fa-solid fa-xmark"></i></span>
                                <span class="btn-inner--text">Tolak</span>
                            </button>
                        </div>
                    @endif
                @endcan
                @canany(['jurusan', 'prodi'])
                    @if ($data->verifymoa->admin_type == $admin_type && $data->verifymoa->status == null)
                        <button class="btn btn-icon btn-sm btn-success me-4" type="button" data-bs-toggle="modal" data-bs-target="#modalVerify" style="width: 15em">
                            <span class="btn-inner--icon"><i class="fa-solid fa-check"></i></span>
                            <span class="btn-inner--text">Verifikasi</span>
                        </button>
                    @endif
                @endcanany
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="col-lg-3 text-sm">Nomor MoA</td>
                        <td class="text-sm">: {{ $data['nomor'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Judul MoA</td>
                        <td class="text-sm">: {{ $data['judul'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Nama Mitra</td>
                        <td class="text-sm">: {{ $data['mitra']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Jurusan</td>
                        <td class="text-sm">: {{ $data['jurusan']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Program Studi</td>
                        <td class="text-sm d-flex">:
                            <ul>
                                @foreach ($data['prodi'] as $x)
                                    <li>{{ $x['nama'] }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3 text-sm">Kategori</td>
                        <td class="text-sm d-flex">:
                            <ul>
                                @foreach ($data['kategori'] as $x)
                                    <li>{{ $x['nama'] }}</li>
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
                        <td class="col-lg-3 text-sm">Dokumen terkait</td>
                        <td class="text-sm d-flex">:
                            <div class="row ms-1">
                                <div class="col">
                                    <a class="btn btn-icon btn-sm btn-info m-0" type="button" target="_blank" href="{{ asset('storage/' . $data['moa_file']) }}">
                                        <span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
                                        <span class="btn-inner--text">Usulan MoA</span>
                                    </a>
                                </div>
                                @if ($data['verifymoa'] != null && $data['verifymoa']['status'] == 'verify')
                                    <div class="col">
                                        <a class="btn btn-icon btn-sm btn-success" type="button" target="_blank" href="{{ asset('storage/' . $data['verifymoa']['valid_moa_file']) }}">
                                            <span class="btn-inner--icon"><i class="fa-solid fa-file-pen"></i></span>
                                            <span class="btn-inner--text">Valid MoA</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @if ($data['verifymoa'] != null)
                        @if ($data->verifymoa->status != null)
                            <tr>
                                <td class="col-lg-3 text-sm">{{ $data->verifymoa->status == 'verify' ? 'Diverifikasi oleh' : 'Direview oleh' }}</td>
                                <td class="text-sm">: {{ $data['verifymoa']['user']['name'] }}</td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @canany(['jurusan', 'prodi'])
        @if ($data->verifymoa->admin_type == $admin_type && $data->verifymoa->status == null)
            <!-- Modal Verify -->
            <div class="modal fade" id="modalVerify" tabindex="-1" role="dialog" aria-labelledby="modalVerifyLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-success text-gradient">Verifikasi</h3>
                                    <p class="mb-0">Pengajuan MoA {{ $data['mitra']['nama'] }}</p>
                                </div>
                                <div class="card-body">
                                    <form role="form text-left" action="{{ route('verify_moa_handler') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="verify_id" value="{{ $data['verifymoa']['id'] }}">
                                        <input type="hidden" name="status" id="status" value="verify">
                                        <label>Tanggal Berakhir Kerjasama <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" name="tgl_akhir" required>
                                        </div>
                                        <label>File MoA <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" type="file" name="valid_moa" accept=".pdf" required>
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
        @endif
    @endcanany
    @can('admin')
        @if ($data['verifymoa'] == null)
            <!-- Modal Forward -->
            <div class="modal fade" id="modalForward" tabindex="-1" aria-labelledby="modalForwardLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalForwardLabel">MoA {{ $data['mitra']['nama'] }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('forward_moa_handler') }}" method="post">
                            <input type="hidden" name="moa_id" value="{{ $data['id'] }}">
                            <div class="modal-body">
                                <p class="mb-3">
                                    Apakah anda yakin meneruskan MoA {{ $data['judul'] }} dengan mitra {{ $data['mitra']['nama'] }} ke Program Studi / Jurusan ?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                @csrf
                                <button type="submit" class="btn btn-primary">Teruskan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Tolak -->
            <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalTolakLabel">Tolak MoA {{ $data['mitra']['nama'] }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('tolak_moa_handler') }}" method="post">
                            <div class="modal-body">
                                <p class="mb-3">
                                    Apakah anda yakin menolak MoA {{ $data['judul'] }} dengan mitra {{ $data['mitra']['nama'] }} ?
                                </p>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan :</label>
                                    <input type="hidden" name="moa_id" value="{{ $data['id'] }}">
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
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::from(route('view_list_moa')) }} + '">Daftar Pengajuan MoA</a></li>');
        $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
    </script>
@endsection

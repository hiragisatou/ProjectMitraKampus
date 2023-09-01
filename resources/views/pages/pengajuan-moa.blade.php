@extends('master-dashboard')
@section('title', 'Pengajuan MoA')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="m-0 align-middle">Form Pengajuan MoA</h5>
                <a href="{{ asset('dist/file/Template MoU.docx') }}" class="btn btn-info m-0">
                    <span class="me-2"><i class="fa-solid fa-file-arrow-down"></i></span>
                    Download Template MoA
                </a>
            </div>
            <div class="container-fluid">
                <form action="{{ route('pengajuan_moa_handler') }}" novalidate method="POST" enctype="multipart/form-data" id="formMoA">
                    @csrf
                    <input type="hidden" name="mou_id" value="{{ $mou->id }}">
                    <div class="mb-3">
                        <label class="form-label">Nomor MoA <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nomor_moa">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul MoA <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                        <select class="form-select" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan -- </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi <span class="text-danger">*</span></label>
                        <select class="form-select" id="prodi" name="prodi[]" multiple="multiple" disabled>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Kerjasama <span class="text-danger">*</span></label>
                        <select class="form-select" name="kategori[]" id="kategori" multiple='multiple'>
                            <option value="">-- Pilih Kategori Kerjasama --</option>
                            @foreach ($kategori as $x)
                                <option value="{{ $x['id'] }}">{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control w-lg-20" name="tgl_mulai">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload MoA <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" name="moa" accept=".pdf">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-3 w-25">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var jurusan = {{ Js::from($jurusan) }};
        var prodi = {{ Js::from($prodi) }};
        $('#prodi').select2({
            width: '100%',
            placeholder: '-- Pilih Program Studi --',
            theme: 'bootstrap-5',
        });
        $('#kategori').select2({
            width: '100%',
            theme: 'bootstrap-5',
            placeholder: '-- Pilih Kategori --',
        });
        $(document).ready(function() {
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::From(route('dashboard')) }} + '">Dashboard</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan MoA</li>');

            jurusan.forEach(e => {
                $('#jurusan').append(new Option(e.nama, e.id));
            })
            $('#jurusan').change(function (e) {
                $('#prodi').empty();
                $("#prodi").append(new Option("-- Pilih Program Studi --", ""));
                prodi.filter(v => v.jurusan_id == this.value).forEach(e => {
                    $("#prodi").append(new Option(e.nama, e.id));
                })
                if (this.value == "") {
                    $('#prodi').attr('disabled', 'true');
                } else {
                    $('#prodi').removeAttr('disabled');
                }

            });
            $('#formMoA').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                rules: {
                    nomor_moa: 'required',
                    judul: 'required',
                    'kategori[]': 'required',
                    jurusan: {
                        required: true
                    },
                    'prodi[]': {
                        required: true
                    },
                    tgl_mulai: 'required',
                    keterangan: 'required',
                    moa: {
                        required: true,
                        accept: 'pdf'
                    }
                },
                messages: {
                    nomor_moa: 'Nomor MoA wajib diisi.',
                    judul: 'Judul wajib diisi.',
                    'kategori[]': 'Kategori Kemitraan wajib diisi.',
                    jurusan: {
                        required: "Jurusan wajib diisi."
                    },
                    'prodi[]': {
                        required: "Program Studi wajib diisi."
                    },
                    tgl_mulai: 'Tanggal mulai MoA wajib diisi',
                    keterangan: 'Keterangan wajib diisi',
                    moa: {
                        required: 'MoU wajib diisi',
                        accept: 'Type file MoU harus PDF'
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    if (element.attr("type") == "checkbox") {
                        element.closest(".form-group").children(0).prepend(error);
                    } else if ((element.hasClass('select2') || element.hasClass('select2-hidden-accessible')) && element.next('.select2-container').length) {
                        error.insertAfter(element.next('.select2-container'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $('select').on('change', e => {
                $(e.target).removeClass('is-invalid')
                $(e.target).addClass('is-valid');
                $(e.target).parent().find('div.invalid-feedback').remove()
            });
        });
    </script>
@endsection

@extends('master-dashboard')
@section('title', 'Pengajuan MoA')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ asset('dist/file/Template MoU.docx') }}" class="btn btn-info">
                    <span class="me-2"><i class="fa-solid fa-file-arrow-down"></i></span>
                    Download Template MoA
                </a>
            </div>
            <div class="container-fluid">
                <form action="{{ route('pengajuan_moa_handler') }}" novalidate method="POST" enctype="multipart/form-data" id="formMoA">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul MoA <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                        <select class="form-select" name="jurusan" id="jurusan">
                            <option value="">-- Pilih Jurusan -- </option>
                            @foreach ($jurusan as $x)
                                <option value="{{ $x['id'] }}">{{ $x['name'] }}</option>
                            @endforeach
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
                                <option value="{{ $x['id'] }}">{{ $x['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control w-lg-20" name="tgl_mulai">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload MoA <span class="text-danger">*</span></label>
                        <input class="form-control" type="file" id="moa" name="moa" accept=".pdf">
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
        var urlProdi = {{ Js::from(route('prodi_in_jurusan')) }}
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
        // $('#prodi_id').select2({
        //     width: '100%',
        //     theme: 'bootstrap-5',
        //     placeholder: '-- Pilih Program Studi --',
        // });
        $(document).ready(function() {
            $('#breadcrumb').empty();
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{ Js::From(route('dashboard')) }} + '">Dashboard</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan MoA</li>');

            $('#jurusan').change(function (e) {
                $.getJSON(urlProdi, {'jurusan': this.value},
                    function (data, textStatus, jqXHR) {
                        $('#prodi').empty();
                        $("#prodi").append(new Option("-- Pilih Program Studi --", ""));
                        data.forEach(element => {
                            $("#prodi").append(new Option(element['name'], element['id']));
                        });
                    }
                );
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
                    judul: 'required',
                    'kategori[]': 'required',
                    jurusan: {
                        required: true
                    },
                    'prodi[]': {
                        required: true
                    },
                    tgl_mulai: 'required',
                    moa: {
                        required: true,
                        accept: 'pdf'
                    }
                },
                messages: {
                    judul: 'Judul wajib diisi.',
                    'kategori[]': 'Kategori Kemitraan wajib diisi.',
                    jurusan: {
                        required: "Jurusan wajib diisi."
                    },
                    'prodi[]': {
                        required: "Program Studi wajib diisi."
                    },
                    tgl_mulai: 'Tanggal mulai kerjasama wajib diisi',
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

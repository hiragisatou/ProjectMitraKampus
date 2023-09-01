@extends('master-dashboard')
@section('title', 'Profil Perusahaan')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('profile_handler') }}" id="form_profile" novalidate>
                @csrf
                @isset($mitra)
                    <input type="hidden" name="id" value="{{ $mitra['id'] }}">
                @endisset
                <div class="row row-cols-2 mb-4">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Mitra <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" value="@isset($mitra){{ $mitra['nama'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="NIB" class="form-label">Nomor Induk Berusaha <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nib" name="nib" value="@isset($mitra){{ $mitra['nib'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="kriteria" class="form-label">Kriteria Mitra <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="kriteria_id" id="kriteria_id">
                            <option value=""></option>
                            @foreach ($kriteria as $x)
                                <option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['kriteria_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sektor Industri <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="sektor_id" id="sektor_id">
                            <option value=""></option>
                            @foreach ($sektor as $x)
                                <option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['sektor_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sifat Mitra <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="sifat_id" id="sifat_id">
                            <option value=""></option>
                            @foreach ($sifat as $x)
                                <option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['sifat_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Mitra <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="jenis_id" id="jenis_id">
                            <option value=""></option>
                            @foreach ($jenis as $x)
                                <option value="{{ $x['id'] }}" @isset($mitra){{ $mitra['jenis_id'] == $x['id'] ? 'selected' : '' }}@endisset>{{ $x['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Klasifikasi <span class="text-danger">*</span></label>
                        <select class="form-select select2" name="klasifikasi" id="klasifikasi">
                            <option value=""></option>
                            <option value="Besar" @isset($mitra) {{ $mitra['klasifikasi'] == 'Besar' ? 'selected' : '' }} @endisset>Besar</option>
                            <option value="Menengah" @isset($mitra) {{ $mitra['klasifikasi'] == 'Menengah' ? 'selected' : '' }} @endisset>Menengah</option>
                            <option value="Kecil" @isset($mitra) {{ $mitra['klasifikasi'] == 'Kecil' ? 'selected' : '' }} @endisset>Kecil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                        <select name="provinsi" class="form-select select2">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_pegawai" class="form-label">Jumlah Pegawai <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="jumlah_pegawai" name="jumlah_pegawai" value="@isset($mitra){{ $mitra['jumlah_pegawai'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten <span class="text-danger">*</span></label>
                        <select name="kabupaten" id="kabupaten" class="form-select select2">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Url Web <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="url" name="url" value="@isset($mitra){{ $mitra['url'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                        <select name="kecamatan" id="kecamatan" class="form-select select2">
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" value="@isset($mitra){{ $mitra['email'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="@isset($mitra){{ $mitra['alamat'] }}@endisset">
                    </div>
                    <div class="mb-3">
                        <label for="notelp" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="@isset($mitra){{ $mitra['no_telp'] }}@endisset">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-6">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="@isset($mitra){{ $mitra['linkedin'] }}@endisset">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="@isset($mitra){{ $mitra['instagram'] }}@endisset">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="@isset($mitra){{ $mitra['facebook'] }}@endisset">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="@isset($mitra){{ $mitra['twitter'] }}@endisset">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="tiktok" class="form-label">Tiktok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="@isset($mitra){{ $mitra['tiktok'] }}@endisset">
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" value="@isset($mitra){{ $mitra['youtube'] }}@endisset">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-info w-25"><span class="me-3"><i class="fa-regular fa-floppy-disk"></i></span>Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @if (url()->current() == route('edit_profile'))
        <script>
            var mitra = {{ Js::from($mitra) }};
            $(document).ready(function() {
                $('select[name="provinsi"]').find('option[value="' + mitra.provinsi_id + '"]').attr('selected', 'true');
                kab.filter(e => e.provinsi_id == $('select[name="provinsi"]').val()).forEach(element => {
                    $('select[name="kabupaten"]').append(new Option(element['name'], element['id']));
                });
                $('select[name="kabupaten"]').find('option[value="' + mitra.kabupaten_id + '"]').attr('selected', 'true');
                kec.filter(e => e.kabupaten_id == $('select[name="kabupaten"]').val()).forEach(element => {
                    $('select[name="kecamatan"]').append(new Option(element['name'], element['id']));
                });
                $('select[name="kecamatan"]').find('option[value="' + mitra.kecamatan_id + '"]').attr('selected', 'true');
            });
        </script>
    @endif
    <script>
        var prov = {{ Js::from($provinsi) }};
        var kab = {{ Js::from($kabupaten) }};
        var kec = {{ Js::from($kecamatan) }};

        prov.forEach(e => {
            $('select[name="provinsi"]').append(new Option(e['name'], e['id']))
        });

        if (window.location.href == {{ Js::from(route('add_profile')) }}) {
            $('aside').remove();
            $('select[name="kabupaten"]').attr('disabled', 'true');
            $('select[name="kecamatan"]').attr('disabled', 'true');
        }

        $(document).ready(function() {
            $('select[name="provinsi"]').change(function(e) {
                if (this.value == '') {
                    $('select[name="kabupaten"]').children().remove().end();
                    $('select[name="kabupaten"]').attr('disabled', 'true');
                } else {
                    $('select[name="kabupaten"]').children().remove().end();
                    $('select[name="kabupaten"]').removeAttr('disabled');
                    $('select[name="kabupaten"]').attr('required', 'true');
                    $('select[name="kecamatan"]').children().remove().end();
                    $('select[name="kecamatan"]').attr('disabled', 'true');

                    $('select[name="kabupaten"]').append(new Option("", ""));
                    kab.filter(e => e.provinsi_id == this.value).forEach(element => {
                        $('select[name="kabupaten"]').append(new Option(element['name'], element['id']));
                    });
                }

            });

            $('select[name="kabupaten"]').change(function(e) {
                if (this.value == '') {
                    $('select[name="kecamatan"]').children().remove().end();
                    $('select[name="kecamatan"]').attr('disabled', 'true');
                } else {
                    $('select[name="kecamatan"]').children().remove().end();
                    $('select[name="kecamatan"]').removeAttr('disabled');
                    $('select[name="kecamatan"]').attr('required', 'true');
                    $('select[name="kecamatan"]').append(new Option("", ""));
                    kec.filter(e => e.kabupaten_id == this.value).forEach(element => {
                        $('select[name="kecamatan"]').append(new Option(element['name'], element['id']));
                    });
                }

            });

            $('#form_profile').validate({
                validClass: "is-valid",
                errorClass: "is-invalid",
                rules: {
                    nama: 'required',
                    nib: 'required',
                    kriteria_mitra_id: 'required',
                    sektor_industri_id: 'required',
                    sifat_mitra_id: 'required',
                    jenis_mitra_id: 'required',
                    klasifikasi: 'required',
                    provinsi: 'required',
                    kabupaten: 'required',
                    kecamatan: 'required',
                    alamat: 'required',
                    jumlah_pegawai: 'required',
                    url: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    no_telp: 'required',

                },
                messages: {
                    nama: 'Nama wajib diisi.',
                    nib: 'Nomor induk perusahaan wajib diisi.',
                    kriteria_mitra_id: 'Kriteria mitra wajib diisi.',
                    sektor_industri_id: 'Sektor industri wajib diisi.',
                    sifat_mitra_id: 'Sifat mitra wajib diisi.',
                    jenis_mitra_id: 'Jenis mitra wajib diisi.',
                    klasifikasi: 'Klasifikasi wajib diisi.',
                    provinsi: 'Provinsi wajib diisi.',
                    kabupaten: 'Kabupaten wajib diisi.',
                    kecamatan: 'Kecamatan wajib diisi.',
                    alamat: 'Alamat wajib diisi.',
                    jumlah_pegawai: 'Jumlah Pegawai wajib diisi.',
                    url: 'Alamat web perusahaan wajib diisi.',
                    email: {
                        required: 'Email wajib diisi.',
                        email: 'Format email tidak sesuai'
                    },
                    no_telp: 'Nomor telepon wajib diisi.',
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
            $('.select2').select2({
                width: '100%',
                theme: 'bootstrap-5',
                placeholder: '-- Pilih salah satu --',
            });

            $('select').on('change', e => {
                $(e.target).removeClass('is-invalid')
                $(e.target).addClass('is-valid');
                $(e.target).parent().find('div.invalid-feedback').remove()
            });
        });
    </script>
@endsection

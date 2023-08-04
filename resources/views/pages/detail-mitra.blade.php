@extends('master-dashboard')
@section('title', 'Data Mitra')
@section('content')
{{-- @dd($data) --}}
	<div class="card p-3">
        <div class="card-body">
            <h6 class="font-weight-bolder">Mitra {{ $data['name'] }}</h6>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama Mitra</td>
                        <td>{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Induk Berusaha</td>
                        <td>{{ $data['nib'] }}</td>
                    </tr>
                    <tr>
                        <td>Kriteria Mitra</td>
                        <td>{{ $data['kriteriamitra']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Sektor Industri</td>
                        <td>{{ $data['sektorindustri']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Sifat Mitra</td>
                        <td>{{ $data['sifatmitra']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Mitra</td>
                        <td>{{ $data['jenismitra']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Klasifikasi</td>
                        <td>{{ $data['klasifikasi'] }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pegawai</td>
                        <td>{{ $data['jumlah_pegawai'] }}</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>{{ $data['kecamatan']['kabupaten']['provinsi']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>{{ $data['kecamatan']['kabupaten']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>{{ $data['kecamatan']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $data['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $data['email'] }}</td>
                    </tr>
                    <tr>
                        <td>Website Perusahaan</td>
                        <td>{{ $data['url'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>{{ $data['no_telp'] }}</td>
                    </tr>
                    <tr>
                        <td>Linkedin</td>
                        <td>{{ $data['linkedin'] }}</td>
                    </tr>
                    <tr>
                        <td>Instagram</td>
                        <td>{{ $data['instagram'] }}</td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td>{{ $data['facebook'] }}</td>
                    </tr>
                    <tr>
                        <td>Twitter</td>
                        <td>{{ $data['twitter'] }}</td>
                    </tr>
                    <tr>
                        <td>Tiktok</td>
                        <td>{{ $data['tiktok'] }}</td>
                    </tr>
                    <tr>
                        <td>YouTube</td>
                        <td>{{ $data['youtube'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>

	<script>
		var url = {{ Js::from(route('view_list_mitra')) }};
        var nama = {{ Js::from($data['name']) }}
        $(document).ready(function () {
            $('td').addClass('text-sm mb-0');
            $('#breadcrumb > .active').remove();
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + url + '">Daftar Mitra</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
        });
	</script>
@endsection

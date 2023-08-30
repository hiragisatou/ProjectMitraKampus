@extends('master-dashboard')
@section('title', 'Data Mitra')
@section('content')
	<div class="card p-3">
        <div class="card-body">
            <h6 class="font-weight-bolder">Mitra {{ $data['nama'] }}</h6>
            <table class="table">
                <tbody>
                    <tr>
                        <td class="col-lg-3">Nama Mitra</td>
                        <td>: {{$data['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Induk Berusaha</td>
                        <td>: {{$data['nib'] }}</td>
                    </tr>
                    <tr>
                        <td>Kriteria Mitra</td>
                        <td>: {{$data['kriteria']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Sektor Industri</td>
                        <td>: {{$data['sektor']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Sifat Mitra</td>
                        <td>: {{$data['sifat']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Mitra</td>
                        <td>: {{$data['jenis']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Klasifikasi</td>
                        <td>: {{$data['klasifikasi'] }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Pegawai</td>
                        <td>: {{$data['jumlah_pegawai'] }}</td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>: {{$data['provinsi'] == null ? '' : $data['provinsi']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>: {{$data['kabupaten'] == null ? '' : $data['kabupaten']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>: {{$data['kecamatan'] == null ? '' : $data['kecamatan']['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{$data['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{$data['email'] }}</td>
                    </tr>
                    <tr>
                        <td>Website Perusahaan</td>
                        <td>: {{$data['url'] }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>: {{$data['no_telp'] }}</td>
                    </tr>
                    <tr>
                        <td>Linkedin</td>
                        <td>: {{$data['linkedin'] }}</td>
                    </tr>
                    <tr>
                        <td>Instagram</td>
                        <td>: {{$data['instagram'] }}</td>
                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td>: {{$data['facebook'] }}</td>
                    </tr>
                    <tr>
                        <td>Twitter</td>
                        <td>: {{$data['twitter'] }}</td>
                    </tr>
                    <tr>
                        <td>Tiktok</td>
                        <td>: {{$data['tiktok'] }}</td>
                    </tr>
                    <tr>
                        <td>YouTube</td>
                        <td>: {{$data['youtube'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
	</div>

	<script>
        $(document).ready(function () {
            $('td').addClass('text-sm mb-0');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{Js::from(route('dashboard'))}} + '">Dashboard</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + {{Js::from(route('view_list_mitra'))}} + '">Daftar Mitra</a></li>');
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
        });
	</script>
@endsection

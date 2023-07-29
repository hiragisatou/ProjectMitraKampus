@extends('admin.main')
@section('title', 'Detail Mitra ' . $data['nama'])
@section('content')
	<div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                    @foreach ($data as $key => $value)
					<tr>
                        <td class="col-lg-3">{{ $key }}</td>
						<td><span class="me-3">:</span> {{ $value }}</td>
					</tr>
                    @endforeach
                </tbody>
            </table>
        </div>
	</div>

	<script>
		var url = {{ Js::from(route('viewListMitra')) }}
		$('#breadcrumb > .active').remove();
		$('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark" aria-current="page"><a class="opacity-5 text-dark" href="' + url + '">Daftar Pengajuan</a></li>');
		$('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>');
	</script>
@endsection

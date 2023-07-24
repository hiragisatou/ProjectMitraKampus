@extends('admin.main')
@section('title', 'List Mitra')
@section('judul', 'List Mitra')
@section('content')
	<div class="container">
		<table class="table table-striped" id="list_mitra">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Kriteria</th>
					<th>Kota</th>
					<th>Provinsi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $x)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $x['nama'] }}</td>
						<td>{{ $x['kriteria']['kriteria'] }}</td>
						<td>{{ $x['kabupaten']['nama'] }}</td>
						<td>{{ $x['provinsi']['nama'] }}</td>
						<td>
							<a href="{{ route('detailMitra', ['mitra' => $x['id']]) }}" class="btn btn-outline-dark">
								<span><i class="lni lni-magnifier"></i></span>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<script>
		$(document).ready(function() {
			var myTable = $('#list_mitra').DataTable({
                searching : false,
            });

			$('#header-search').on('keyup', function() {
				console.log(this.value);
				myTable.search(this.value).draw();
			});
		});
	</script>
@endsection

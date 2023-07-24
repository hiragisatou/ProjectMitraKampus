@extends('admin.main')
@section('title', 'List Mitra')
@section('judul', 'List Mitra')
@section('content')
	<div class="container">
		<table class="table table-striped" id="list_mitra">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Mitra</th>
					<th>Jumlah Kerjasama</th>
					<th>Nama User</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $x)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $x['nama'] }}</td>
						<td>{{ count($x['pengajuan_mitra']) }}</td>
						<td>{{ $x['user']['name'] }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<script>
		$(document).ready(function() {
			var myTable = $('#list_mitra').DataTable({
			});
		});
	</script>
@endsection

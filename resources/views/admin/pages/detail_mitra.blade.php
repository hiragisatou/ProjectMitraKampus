@extends('admin.main')
@section('title', 'Detail Mitra')
@section('judul', 'Detail Mitra')
@section('content')
<div class="container">
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
@endsection

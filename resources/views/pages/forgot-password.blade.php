@extends('master-dashboard')
@section('title', 'Reset Password Request')
@section('content')
	<div class="card m-auto" style="width: 40%">
		<div class="card-body p-3">
			<form action="" method="post">
                <div class="row mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                <button type="submit" class="btn btn-info col">Kirim Link Reset Password</button>
            </form>
		</div>
	</div>
	<script>
		$('aside').remove();
	</script>
@endsection

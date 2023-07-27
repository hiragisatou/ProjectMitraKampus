@extends('admin.main')
@section('title', 'Pengaturan Akun')
@section('judul', 'Pengaturan Akun')
@section('content')
	<div class="card">
		<div class="card-body">
			<form action="{{ route('updateAkunHandler') }}" method="POST" class="needs-validation">
				@csrf
				<div class="mb-3 row">
					<label for="nama" class="col-sm-2 col-form-label">Nama <span class="text-danger">*</span></label>
					<div class="col-sm-10 col-lg-5">
						<input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name" required>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10 col-lg-5">
						<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $data->email }}" name="email">
					</div>
				</div>
				<div class="mb-3 mt-3 row">
					<label for="" class="col-sm-2 col-form-label"></label>
					<div class="form-check form-switch col-sm-10 col-lg-5">
						<input class="form-check-input" type="checkbox" role="switch" id="newPasswordSwitch">
						<label class="form-check-label" for="newPasswordSwitch">Ubah Password</label>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="new-password" class="col-sm-2 col-form-label">Password Baru</label>
					<div class="col-sm-10 col-lg-5">
						<input type="password" class="form-control" id="new-password" name="newPassword" disabled>
						<div id="passwordHelpBlock" class="form-text">
							Your password must be 8-20 characters.
						</div>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="confirm-password" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
					<div class="col-sm-10 col-lg-5">
						<input type="password" class="form-control" id="confirm-password" name="confirmPassword" disabled>
					</div>
				</div>
				<div class="mb-3 mt-4 row">
					<label for="inputPassword" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
					<div class="col-sm-10 col-lg-5">
						<input type="password" class="form-control  {{ session()->has('error') ? 'is-invalid' : '' }}" id="inputPassword" name="password" required>
						@if (session()->has('error'))
							<div class="invalid-feedback">
								{{ session('error') }}
							</div>
						@endif
					</div>
				</div>
				<div class="d-flex justify-content-end col-lg-7 pe-2 mt-40">
					<button type="submit" class="btn btn-primary w-25"><i class="lni lni-save"></i><span class="ms-3 text-uppercase"> Update</span></button>
				</div>
			</form>
		</div>
	</div>
	<script>
		(() => {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			const forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.from(forms).forEach(form => {
				form.addEventListener('submit', event => {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
		})()

		$(document).ready(function() {
            $('#breadcrumb > .active').remove();
            $('#breadcrumb').append('<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengaturan Akun</li>');
			$('#newPasswordSwitch').change(function() {
				if (this.value == "") {
					$('#new-password').attr('disabled', true);
					$('#confirm-password').attr('disabled', true);
					$('#new-password').val('');
					$('#confirm-password').val('');
					$('#new-password').attr('required', false);
					$('#confirm-password').attr('required', false);
					this.value = "on";
				} else {
					$('#new-password').attr('required', true);
					$('#confirm-password').attr('required', true);
					$('#new-password').attr('disabled', false);
					$('#confirm-password').attr('disabled', false);
					this.value = "";
				}
			});
		});
	</script>
@endsection

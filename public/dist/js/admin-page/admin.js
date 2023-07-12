$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		}
	})

	if ($('#notification-toast').length > 0) {
		Toast.fire({
			icon: 'success',
			title: $('#notification-toast').val()
		})
	}

	$('.ruang-lingkup-mitra').select2({
		width: '100%',
		placeholder: 'Ruang Lingkup',
		theme: 'bootstrap-5'
	});
	$('.selection').addClass('w-100');
});

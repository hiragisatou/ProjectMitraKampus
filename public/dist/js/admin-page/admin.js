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

$(document).ready(function () {
	if ($('#notification-toast-success').length > 0) {
		Toast.fire({
			icon: 'success',
			title: $('#notification-toast-success').val()
		})
	}
    if ($('#notification-toast-error').length > 0) {
		Toast.fire({
			icon: 'error',
			title: $('#notification-toast-error').val()
		})
	}
});

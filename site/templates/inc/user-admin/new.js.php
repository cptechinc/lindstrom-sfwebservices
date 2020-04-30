$(function() {
	$('#new-user-form').validate({
		errorClass: "is-invalid",
		validClass: "is-valid",
		errorPlacement: function(error, element) {
			error.insertAfter(element).addClass('invalid-feedback');
		},
		ignore: ".validate-ignore",
		rules: {
			username: { required: true },
			password: { required: true },
		},
		submitHandler: function(form) {
			form.submit();
		}
	});
});

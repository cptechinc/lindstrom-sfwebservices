$(function() {
    $("body").on("change", 'select[name=serviceMethod]', function(e) {
		let input = $(this);

		if (input.val() == 'POST') {
            input.closest('form').attr('method', 'POST');
            return;
        }
        input.closest('form').attr('method', 'GET');
	});
});
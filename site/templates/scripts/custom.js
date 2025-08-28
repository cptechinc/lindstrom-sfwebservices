$(function() {
    $('.datepicker').each(function(index) {
		let container = $(this);
		let val = container.find('input.date-input').val();

		container.datepicker({
			date: val,
			allowPastDates: true,
		});
	});
});
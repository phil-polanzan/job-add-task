export function setDatepicker(el) {
	$(el).datepicker({
		dateFormat: 'dd.mm.yy',
		autoclose: true,
		todayHighlight: true
	});
}
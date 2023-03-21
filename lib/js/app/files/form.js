import { AppDatepicker } from '../classes/vendor-lib-settings/app-datepicker';
import { JobAddForm } from "../classes/forms/job-add-form";
import { AppSummernote } from '../classes/vendor-lib-settings/app-summernote';

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));
	AppSummernote.init($('.html-editor'));

	let formSelector = '#job-add',
		formObj = new JobAddForm(formSelector);

	formObj.el.submit(function(e) {
		e.preventDefault();
		formObj.submit();

		return false;
	});
});

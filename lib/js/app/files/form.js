import { AppDatepicker } from '../classes/vendor-lib-settings/app-datepicker';
import { AddJobForm } from "../classes/forms/add-job-form";
import { AppSummernote } from '../classes/vendor-lib-settings/app-summernote';

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));
	AppSummernote.init($('.html-editor'));

	let formSelector = '#job-add',
		formObj = new AddJobForm(formSelector);

	formObj.el.submit(function(e) {
		e.preventDefault();
		formObj.submit();

		return false;
	});
});

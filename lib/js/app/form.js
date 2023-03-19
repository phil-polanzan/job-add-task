import { AppDatepicker } from './classes/app-datepicker.js';
import { AddJobForm } from "./classes/add-job-form";
import { AppSummernote } from './classes/app-summernote';

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

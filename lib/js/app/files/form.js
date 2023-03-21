import { AppDatepicker } from '../classes/vendor-lib-settings/app-datepicker';
import { JobAddForm } from "../classes/forms/job-add-form";
import { AppSummernote } from '../classes/vendor-lib-settings/app-summernote';

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));
	AppSummernote.init($('.html-editor'));

	let	formEl = $('form.app-form.model-form'),
		formTag = formEl.data('form-tag'),
		formClassName = eval(`${formTag.split('-').map(el => el.charAt(0).toUpperCase() + el.slice(1)).join('')}`);

	let formObj = new formClassName(`#${formEl.attr('id')}`);

	formObj.el.submit(function(e) {
		e.preventDefault();
		formObj.submit();

		return false;
	});
});

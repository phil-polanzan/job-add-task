import {AppDatepicker} from '../classes/vendor-lib-settings/app-datepicker';
import {AppSummernote} from '../classes/vendor-lib-settings/app-summernote';
import {FormFactory} from "../classes/factories/form-factory";

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));
	AppSummernote.init($('.html-editor'));

	let formObj = FormFactory.getInstance('form.app-form.model-form');

	formObj.el.submit(function(e) {
		e.preventDefault();
		formObj.submit();

		return false;
	});
});

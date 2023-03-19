import { AppDatepicker } from './classes/app-datepicker.js';
import {AddJobForm} from "./classes/add-job-form";

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));

	let formSelector = '#job-add',
		formObj = new AddJobForm(formSelector);

	formObj.el.submit(function(e) {
		e.preventDefault();
		formObj.submit();

		return false;
	});

});

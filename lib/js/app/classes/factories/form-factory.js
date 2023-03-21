import { Form } from "../forms/form";
import { AjaxForm } from "../forms/ajax-form";
import { JobAddForm } from "../forms/job-add-form";

export class FormFactory
{
	static getInstance(selector)
	{
		let	formEl = $(selector),
			formClassName = eval(
				`${formEl.data('form-tag').split('-').map(el => el.charAt(0).toUpperCase() + el.slice(1)).join('')}`
			);

		return new formClassName(`#${formEl.attr('id')}`);
	}
}

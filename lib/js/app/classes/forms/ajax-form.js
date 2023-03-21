import { Form } from "./form";
import { AjaxResponse } from "../responses/ajax-response";

export class AjaxForm extends Form
{
	constructor(selector, method)
	{
		super(selector);
		this.method = method;
	}

	setAlertMessage(el, msg)
	{
		el.children('p.resp-msg').text(msg);
	}

	showAlertMessage(selector, msg) {
		let obj = this;

		this.containerEl.find(selector).each(function() {
			let currEl = $(this);
			obj.setAlertMessage(currEl, msg);
			currEl.show();
		});
	}

	done(response)
	{
		if (response.status == AjaxResponse.getOkMessage()) {
			this.showAlertMessage('.alert-success', response.message);
			this.el.hide();
		} else {
			this.showAlertMessage('.alert-danger', response.message);
		}
	}

	submit()
	{
		$('div.alert').hide();

		if (this.validate()) {
			let obj = this;

			$.ajax({
				type: obj.method,
				data: obj.getSubmitterValues(),
				dataType: 'json',
				async: false,
				url: obj.el.attr('action'),
			})
			.done(function(data) {
				obj.done(data);
			});
		}

		return false;
	}
}
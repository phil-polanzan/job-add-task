import { AjaxForm } from "./ajax-form";
import { AjaxResponse } from "./ajax-response";

export class AjaxPostForm extends AjaxForm
{
	constructor(selector)
	{
		super(selector, 'post');
	}

	hideFeedbackMessage()
	{
		let obj = this;
		this.el.find('div.alert').each(function() {
			let currEl = $(this);
			obj.setAlertMessage(currEl, '');
			currEl.hide();
		});
	}

	setAlertMessage(el, msg)
	{
		el.children('p.resp-msg').text(msg);
	}

	showAlertMessage(selector, msg) {
		let obj = this;

		obj.hideFeedbackMessage();
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

}
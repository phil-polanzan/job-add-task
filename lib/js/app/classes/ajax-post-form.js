import { AjaxForm } from "./ajax-form";

export class AjaxPostForm extends AjaxForm
{
	constructor(selector)
	{
		super(selector, 'post');
	}

	hideFeedbackMessage()
	{
		this.el.find('div.alert').each(function() {
			$(this).hide();
		});
	}

	successMessage()
	{
		this.hideFeedbackMessage();
		this.el.find('div.alert-success').each(function() {
			$(this).show();
		});
	}

	errorMessage()
	{
		this.hideFeedbackMessage();
		this.el.find('div.alert-danger').each(function() {
			$(this).show();
		});
	}

	done(response)
	{
		if (response.status == 'ok') {
			this.successMessage();
		} else {
			this.errorMessage();
		}
	}

}
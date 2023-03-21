import { Form } from "./form";

export class AjaxForm extends Form
{
	constructor(selector)
	{
		super(selector);
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
		console.log('Request submitted');
		console.log(response)
	}

	submit()
	{
		$('div.alert').hide();

		if (this.validate()) {
			let obj = this;

			$.ajax({
				type: obj.el.attr('method'),
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
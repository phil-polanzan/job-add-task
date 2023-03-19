import { Form } from "./form";

export class AjaxForm extends Form
{
	constructor(selector, method)
	{
		super(selector);
		this.method = method;
	}

	done(response)
	{
		console.log('request sent')
		console.log(response)
	}

	submit()
	{
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
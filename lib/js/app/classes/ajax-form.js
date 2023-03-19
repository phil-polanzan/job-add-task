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
				// contentType: "application/json; charset=utf-8",
				dataType: 'text',
				async: false,
				url: obj.el.attr('action'),
				// complete: function(data) {
				// 	console.log(data);
				// }
			}).done(function(repsonse) {
				obj.done(repsonse);
			});
		}
	}
}
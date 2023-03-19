export class Form
{
	constructor(selector)
	{
		this.selector = selector;
		this.el = $(this.selector)
	}

	setElInvalid(el)
	{
		el.addClass('is-invalid');
		el.siblings('.invalid-feedback').show();
	}

	getSubmitterValues()
	{
		let data = {};

		this.el.find('.form-control').each(function() {
			let currEl = $(this);

			if (currEl.val()) {
				data[currEl.attr('name')] = currEl.val();
			}
		});

		return data;
	}

	updateInvalidFields()
	{
		let obj = this;

		$(obj.selector).find('.form-control').each(function() {
			let currEl = $(this);
console.log(currEl)
			if (currEl.prop('required') && !currEl.val()) {
				obj.setElInvalid(currEl);
			}
		});
	}

	validate()
	{
		let invalidFields = $('.is-invalid');

		if (invalidFields.length > 0) {
			invalidFields.removeClass('is-invalid');
		}

		this.updateInvalidFields();

		return invalidFields.length > 0;
	}
}
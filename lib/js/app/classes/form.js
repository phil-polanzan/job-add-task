import {DateUtils} from "./date-utils";

export class Form
{
	constructor(selector)
	{
		this.selector = selector;
		this.el = $(this.selector);
		this.containerEl = this.el.closest('.form-body');
	}

	setElInvalid(el)
	{
		el.addClass('is-invalid');
		el.siblings('.invalid-feedback').show();
		this.validSubmit = false;
	}

	getSubmitterValues()
	{
		let data = {};

		this.el.find('.form-control').each(function() {
			let currEl = $(this),
				value = currEl.val();

			if (value) {
				// date values
				if (currEl.hasClass('datepicker')) {
					value = DateUtils.getDateString(DateUtils.getFromString(value));
				}

				data[currEl.attr('name')] = value;
			}
		});

		return data;
	}

	updateInvalidFields()
	{
		let obj = this;

		$(obj.selector).find('.form-control').each(function() {
			let currEl = $(this);

			if (currEl.prop('required') && !currEl.val()) {
				obj.setElInvalid(currEl);
			}
		});
	}

	validate()
	{
		this.validSubmit = true;
		let invalidFields = $('.is-invalid');

		if (invalidFields.length > 0) {
			invalidFields.removeClass('is-invalid');
		}

		this.updateInvalidFields();

		return this.validSubmit;
	}
}
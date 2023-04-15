import {DateUtils} from "../utils/date-utils";

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

	getSubmittedValues()
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

		obj.el.find('.form-control').each(function() {
			let currEl = $(this);

			if (currEl.prop('required') && !currEl.val()) {
				obj.setElInvalid(currEl);
			}
		});
	}

	validate()
	{
		// checkbox to disable front end validation
		if ($('#disable_js_validation').is(':checked')) {
			return true;
		}

		this.validSubmit = true;
		let invalidFields = $('.is-invalid');

		if (invalidFields.length > 0) {
			invalidFields.removeClass('is-invalid');
		}

		this.updateInvalidFields();

		return this.validSubmit;
	}
}
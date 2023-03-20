import { DateUtils } from "./date-utils";
import { AjaxForm } from "./ajax-form";

export class AddJobForm extends AjaxForm
{
	constructor(selector)
	{
		super(selector, 'post');
	}

	updateInvalidFields()
	{
		super.updateInvalidFields();

		let obj = this,
			estimatedHours = $('#estimated_hours'),
			schedStartDate = $('#schedule_start_date'),
			schedEndDate = $('#schedule_end_date');

		// check dates
		if (schedStartDate.val() && schedEndDate.val()) {
			let start = DateUtils.getFromString(schedStartDate.val()),
				end = DateUtils.getFromString(schedEndDate.val());

			if (start > end) {
				obj.setElInvalid(schedStartDate);
				obj.setElInvalid(schedEndDate);
			}
		}

		// check estimated hours
		if (estimatedHours.val()) {
			let step = estimatedHours.attr('step'),
				fraction = estimatedHours.val() / step;

			if (fraction != Math.floor(fraction)) {
				obj.setElInvalid(estimatedHours);
			}
		}
	}
}
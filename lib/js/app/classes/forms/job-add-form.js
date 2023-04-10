import {DateUtils} from "../utils/date-utils";
import {AjaxPostForm} from "./ajax-post-form";

export class JobAddForm extends AjaxPostForm
{
	updateInvalidFields()
	{
		super.updateInvalidFields();

		let obj = this,
			estimatedHours = $('#estimated_hours'),
			estimatedHoursVal = estimatedHours.val(),
			schedStartDate = $('#schedule_start_date'),
			schedEndDate = $('#schedule_end_date'),
			schedStartDateVal = schedStartDate.val(),
			schedEndDateVal = schedEndDate.val();

		// check dates
		if (
			schedStartDateVal && schedEndDateVal &&
			DateUtils.getFromString(schedStartDateVal) > DateUtils.getFromString(schedEndDateVal)
		) {
			obj.setElInvalid(schedStartDate);
			obj.setElInvalid(schedEndDate);
		}

		// check estimated hours
		if (estimatedHoursVal) {
			let fraction = estimatedHoursVal / estimatedHours.attr('step');

			if (fraction != Math.floor(fraction)) {
				obj.setElInvalid(estimatedHours);
			}
		}
	}
}
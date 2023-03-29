import {DateUtils} from '../utils/date-utils';

export class AppDatepicker
{
	static init(el)
	{
		el.datepicker({
			dateFormat: DateUtils.getFrontEndFormat(),
			autoclose: true,
			todayHighlight: true
		});
	}
}
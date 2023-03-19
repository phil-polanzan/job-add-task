import { AppDatepicker } from './classes/app-datepicker.js';
import { DateUtils } from './classes/date-utils.js';

jQuery(function ($) {
	AppDatepicker.init($('.datepicker'));

	function invalidEl(el) {
		el.addClass('is-invalid');
		el.siblings('.invalid-feedback').show();
	}

	function getFormValues(el) {
		let data = {};

		el.find('.form-control').each(function() {
			let currEl = $(this);

			if (currEl.val()) {
				data[currEl.attr('name')] = currEl.val();
			}
		});

		return data;
	}

	function checkRequiredField(el) {
		let submit = true;

		el.find('.form-control').each(function() {
			let currEl = $(this);

			currEl.removeClass('is-invalid');

			if (currEl.prop('required') && !currEl.val()) {
				submit = false;
				invalidEl(currEl);
			}
		});

		return submit;
	}

	$('.form-body').submit(function(e) {
		e.preventDefault();

		let currEl = $(this),
			estimatedHours = $('#estimated_hours'),
			schedStartDate = $('#schedule_start_date'),
			schedEndDate = $('#schedule_end_date'),
			submit = true;

		submit = checkRequiredField(currEl);

		// check dates
		if (schedStartDate.val() && schedEndDate.val()) {
			let start = DateUtils.getFromString(schedStartDate.val()),
				end = DateUtils.getFromString(schedEndDate.val());

			if (start > end) {
				invalidEl(schedStartDate);
				invalidEl(schedEndDate);
				submit = false;
			}
		}

		// check estimated hours
		if (estimatedHours.val()) {
			let step = estimatedHours.attr('step'),
				fraction = estimatedHours.val() / step;

			if (fraction != Math.floor(fraction)) {
				invalidEl(estimatedHours);
				submit = false;
			}
		}

		if (submit) {
			$.ajax({
				type: 'POST',
				data: getFormValues(currEl),
				// contentType: "application/json; charset=utf-8",
				dataType: 'text',
				async: false,
				url: currEl.attr('action'),
				// complete: function(data) {
				// 	console.log(data);
				// }
			}).done(function(data) {
				console.log(data);
			});
		}

		return false;
	});

});

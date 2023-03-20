<?php

namespace App\Forms;

use App\FormElements\CheckBox;
use App\FormElements\DateInput;
use App\FormElements\HiddenInput;
use App\FormElements\HtmlTextarea;
use App\FormElements\NumericInput;
use App\FormElements\SubmitButton;
use App\FormElements\TextInput;
use App\Models\Job;

class JobAddForm extends AjaxForm
{
	private Job $job;

	public function __construct(string $title, string $action, ?string $method = null)
	{
		parent::__construct($title, $action, self::METHOD_POST);
		$this->addAttributes([
			'id' => 'job-add',
			'class' => 'app-form model-form'
		]);
		$this->JobElements();
	}

	public function JobElements() : void
	{
		$job = new Job();

		$title = new TextInput('title', 'Title');
		$title->addAttributes([
			'maxlength' => $job->title->getLength(),
			'required' => !$job->title->isEmptyValueAllowed()
		]);
		$title->setValidationErrorMessage('Please fill out this field.');

		$estimatedHours = new NumericInput('estimated_hours', 'Estimated Hours');
		$estimatedHours->addAttributes([
			'min' => $job->estimated_hours->getMinValue(),
			'step' => $job->estimated_hours->getStep()
		]);
		$estimatedHours->setValidationErrorMessage('Please set with valid value.');
		$estimatedHours->setNotes('Allowed values integers or decimal ending with 0.5 (e.g. 1, 1.5).');

		$entryDate = new DateInput('entry_date', 'Entry Date');
		$entryDate->addAttributes([
			'required' => !$job->entry_date->isEmptyValueAllowed()
		]);
		$entryDate->setValidationErrorMessage('Please fill out this field.');

		$schedStartDate = new DateInput('schedule_start_date', 'Schedule Start Date');
		$schedStartDate->setValidationErrorMessage('Start Date cannot be greater than End Date.');

		$schedEndDate = new DateInput('schedule_end_date', 'Schedule End Date');
		$schedEndDate->setValidationErrorMessage('End Date cannot be smaller than Start Date.');

		$button = new SubmitButton('Submit');

		$checkbox = new CheckBox('disable_js_validation', 'Diadble Bootstrap validation');

		$this->setElements([
			new HiddenInput('controller', 'job_controller'),
			$title,
			new HtmlTextarea('description', 'Description'),
			$estimatedHours,
			$entryDate,
			$schedStartDate,
			$schedEndDate,
			new CheckBox('disable_js_validation', 'Disable Bootstrap validation'),
			$button
		]);
	}


	public function getJsFiles() : array
	{
		return array_merge(
			parent::getJsFiles(),
			[[
				'name' => 'lib/js/app/form.js',
				'is_module' => true
			]]
		);
	}

}

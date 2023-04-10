<?php

namespace App\Forms;

use App\FormElements\CheckBox;
use App\FormElements\DateInput;
use App\FormElements\HtmlTextarea;
use App\FormElements\NumericInput;
use App\FormElements\SubmitButton;
use App\FormElements\TextInput;
use App\Models\Job;

class JobAddForm extends AjaxPostForm
{
	public function __construct(string $label)
	{
		parent::__construct($label, 'job');
		$this->addAttributes([
			'id' => 'job-add',
			'class' => 'app-form model-form'
		]);
		$this->JobElements();
	}

	public function JobElements() : void
	{
		$job = new Job();
		$jobProperties = (object)$job->getProperties();

		$title = new TextInput('title', 'Title');
		$title->addAttributes([
			'maxlength' => $jobProperties->title->getLength(),
			'required' => !$jobProperties->title->isEmptyValueAllowed()
		]);
		$title->setValidationErrorMessage('Please fill out this field.');

		$estimatedHours = new NumericInput('estimated_hours', 'Estimated Hours');
		$estimatedHours->addAttributes([
			'min' => $jobProperties->estimated_hours->getMinValue(),
			'step' => $jobProperties->estimated_hours->getStep()
		]);
		$estimatedHours->setValidationErrorMessage('Please set with valid value.');
		$estimatedHours->setNotes('Allowed values integers or decimal ending with 0.5 (e.g. 1, 1.5).');

		$entryDate = new DateInput('entry_date', 'Entry Date');
		$entryDate->addAttributes([
			'required' => !$jobProperties->entry_date->isEmptyValueAllowed()
		]);
		$entryDate->setValidationErrorMessage('Please fill out this field.');

		$schedStartDate = new DateInput('schedule_start_date', 'Schedule Start Date');
		$schedStartDate->setValidationErrorMessage('Start Date cannot be greater than End Date.');

		$schedEndDate = new DateInput('schedule_end_date', 'Schedule End Date');
		$schedEndDate->setValidationErrorMessage('End Date cannot be smaller than Start Date.');

		$button = new SubmitButton('Submit');

		$checkbox = new CheckBox('disable_js_validation', 'Disable Js validation');
		$checkbox->setNotes('For testing back-end validation');

		$this->setElements([
			$title,
			new HtmlTextarea('description', 'Description'),
			$estimatedHours,
			$entryDate,
			$schedStartDate,
			$schedEndDate,
			$checkbox,
			$button
		]);
	}

	public function getJsFiles() : array
	{
		return array_merge(
			parent::getJsFiles(),
			[[
				'name' => 'lib/js/app/files/form.js',
				'is_module' => true
			]]
		);
	}
}

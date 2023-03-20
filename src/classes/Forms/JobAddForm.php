<?php

namespace App\Forms;

use App\FormElements\DateInput;
use App\FormElements\HtmlTextarea;
use App\FormElements\NumericInput;
use App\FormElements\SubmitButton;
use App\FormElements\TextInput;

class JobAddForm extends AjaxForm
{
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
		$title = new TextInput('title', 'Title');
		$title->addAttributes([
			'maxlength' => 50,
			'required' => true
		]);
		$title->setNotes('Please fill out this field.');

		$estimatedHours = new NumericInput('estimated_hours', 'Estimated Hours');
		$estimatedHours->addAttributes([
			'min' => 0,
			'step' => 0.5
		]);
		$estimatedHours->setNotes('Please set with valid value.');

		$entryDate = new DateInput('entry_date', 'Entry Date');
		$entryDate->addAttributes([
			'required' => true
		]);
		$entryDate->setNotes('Please fill out this field.');

		$schedStartDate = new DateInput('schedule_start_date', 'Schedule Start Date');
		$schedStartDate->setNotes('Start Date cannot be greater than End Date.');

		$schedEndDate = new DateInput('schedule_end_date', 'Schedule End Date');
		$schedEndDate->setNotes('End Date cannot be smaller than Start Date.');

		$button = new SubmitButton('Submit');

		$this->setElements([
			$title,
			new HtmlTextarea('description', 'Description'),
			$estimatedHours,
			$entryDate,
			$schedEndDate,
			$schedEndDate,
			$button
		]);
	}
}

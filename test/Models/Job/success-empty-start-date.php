<?php

use App\Models\Job;
use App\Terminal\Messenger;
use App\Exceptions\ModelValidationException;

Messenger::printInfo('Job with valid values and empty start date');
$object = new Job();
$object->setPropertiesValues([
	'title' => 'Title',
	'description' => 'Description',
	'estimated_hours' => '4.5',
	'entry_date' => '2023-03-17',
	'schedule_start_date' => '',
	'schedule_end_date' => '2023-03-23',
]);

if (!$object->validate()) {
	throw new ModelValidationException($object, 'Properties value not valid');
}

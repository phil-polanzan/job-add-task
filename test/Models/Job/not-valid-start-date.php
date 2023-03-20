<?php

use App\Models\Job;
use App\Terminal\Messenger;
use App\Exceptions\ModelValidationException;

Messenger::printInfo('Job with not valid start date');
$object = new Job();
$object->setPropertiesValues([
	'title' => 'Title',
	'description' => 'Description',
	'estimated_hours' => '4.2',
	'entry_date' => 'hello world',
	'schedule_start_date' => '2023-03-24',
	'schedule_end_date' => '2023-03-23',
]);

if (!$object->validate()) {
	throw new ModelValidationException($object, 'Properties value not valid');
}


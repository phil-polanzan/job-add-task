<?php

use App\Models\Job;
use App\Terminal\Messenger;
use App\Exceptions\ModelValidationException;

Messenger::printInfo('Job with not valid entry date');
$object = new Job();
$object->setPropertiesValues([
	'title' => 'Title',
	'description' => 'Description',
	'estimated_hours' => '4.2',
	'entry_date' => '2023-02-30',
	'schedule_start_date' => '',
	'schedule_end_date' => '',
]);

if (!$object->validate()) {
	throw new ModelValidationException($object, 'Properties value not valid');
}


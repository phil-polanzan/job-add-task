<?php

use App\Models\Job;
use App\Terminal\Messenger;
use App\Exceptions\ModelValidationException;

Messenger::printInfo('Job with empty title');
$object = new Job();
$object->setPropertiesValues([
	'title' => '',
	'description' => '',
	'estimated_hours' => '',
	'entry_date' => '',
	'schedule_start_date' => '',
	'schedule_end_date' => '',
]);

if (!$object->validate()) {
	throw new ModelValidationException($object, 'Properties value not valid');
}


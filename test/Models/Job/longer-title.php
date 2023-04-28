<?php

use App\Models\Job;
use App\Terminal\Messenger;
use App\Exceptions\ModelValidationException;

Messenger::info('Job with longer title');
$title = '012345678901234567890123456789012345678901234567891';
$object = new Job();
$object->setPropertiesValues([
	'title' => $title,
	'description' => '',
	'estimated_hours' => '',
	'entry_date' => '',
	'schedule_start_date' => '',
	'schedule_end_date' => '',
]);

if (!$object->validate()) {
	throw new ModelValidationException($object, 'Properties value not valid');
}


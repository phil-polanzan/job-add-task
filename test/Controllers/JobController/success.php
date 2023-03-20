<?php
use App\Requests\AsyncPostRequest;
use App\Terminal\Messenger;

Messenger::printInfo('Job with valid properties');
AsyncPostRequest::setIgnoreExit(true);

$_POST = [
	'controller' => 'job_controller',
	'title' => 'Title',
	'description' => 'Description',
	'estimated_hours' => '4.5',
	'entry_date' => '2023-03-17',
	'schedule_start_date' => '2023-03-20',
	'schedule_end_date' => '2023-03-23'
];

include ROOT_PATH . '/src/files/requests/post.php';

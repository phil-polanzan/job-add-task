<?php
$title = 'Job with valid properties';

$_POST = [
	'controller' => 'job_controller',
	'title' => 'Title',
	'description' => 'Description',
	'estimated_hours' => '4.5',
	'entry_date' => '2023-03-17',
	'schedule_start_date' => '2023-03-20',
	'schedule_end_date' => '2023-03-23'
];
include ROOT_PATH . '/test/Controllers/JobController/inc/exec.php';

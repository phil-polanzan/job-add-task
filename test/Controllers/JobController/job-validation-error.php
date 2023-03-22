<?php
$title = 'Job with not valid properties';
$_POST = [
	'controller' => 'job_controller',
	'title' => ''
];
include ROOT_PATH . '/test/Controllers/JobController/inc/exec.php';

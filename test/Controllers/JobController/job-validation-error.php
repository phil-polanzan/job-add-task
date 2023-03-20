<?php

use App\Requests\AsyncPostRequest;
use App\Terminal\Messenger;

Messenger::printInfo('Job with not valid properties');
AsyncPostRequest::setIgnoreExit(true);

$GLOBALS['ignoreExit'] = true;
$_POST = [
	'controller' => 'job_controller',
	'title' => ''
];

include ROOT_PATH . '/src/files/requests/post.php';

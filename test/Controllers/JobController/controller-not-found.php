<?php

use App\Requests\AsyncPostRequest;
use App\Terminal\Messenger;

Messenger::printInfo('Controller Not Found');
AsyncPostRequest::setIgnoreExit(true);

$_POST = [
	'controller' => 'controller'
];

include ROOT_PATH . '/src/files/requests/post.php';

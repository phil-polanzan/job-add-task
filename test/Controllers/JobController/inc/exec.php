<?php

use App\Exceptions\AppException;
use App\Terminal\Messenger;
use App\Responses\Response;

Messenger::info($title);
include ROOT_PATH . '/src/files/requests/post.php';
$msg = (object)$response->getData();

if ($msg->status == Response::STATUS_ERROR) {
	throw new AppException('Post Request failed', 'Post');
}

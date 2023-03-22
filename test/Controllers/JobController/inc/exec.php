<?php

use App\Exceptions\AppException;
use App\Requests\AsyncPostRequest;
use App\Terminal\Messenger;
use App\Responses\Response;

Messenger::printInfo($title);
AsyncPostRequest::setIgnoreExit(true);

ob_start();
include ROOT_PATH . '/src/files/requests/post.php';
$msg = json_decode(ob_get_clean());
print_r($msg->status);
if ($msg->status == Response::STATUS_ERROR) {
	throw new AppException('Post Request failed', 'AjaxPost');
}

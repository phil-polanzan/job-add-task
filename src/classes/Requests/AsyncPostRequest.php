<?php

namespace App\Requests;

use App\Responses\JsonResponse;
use App\Responses\Response;

class AsyncPostRequest extends PostRequest
{
	private static bool $ignoreExit = false;

	protected function finally() : void
	{
		$response = new JsonResponse();
		$response->setStatus($this->getRequestOk() ? Response::STATUS_SUCCESS : Response::STATUS_ERROR);
		$response->setMessage($this->getMessage());
		$response->printData();

		if (!self::$ignoreExit) {
			die();
		}
	}

	public static function setIgnoreExit(bool $value = false) : void
	{
		self::$ignoreExit = $value;
	}

	public static function getIgnoreExit() : bool
	{
		return self::$ignoreExit;
	}
}

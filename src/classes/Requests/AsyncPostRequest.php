<?php

namespace App\Requests;

use App\Responses\JsonResponse;
use App\Responses\Response;

class AsyncPostRequest extends PostRequest
{
	private static bool $ignoreExit = false;

	protected function finally()
	{
		$response = new JsonResponse($this->getRequestOk(), $this->getMessage());
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

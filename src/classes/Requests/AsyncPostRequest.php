<?php

namespace App\Requests;

use App\Responses\JsonResponse;
use App\Responses\Response;

class AsyncPostRequest extends PostRequest
{
	public function getResponse() : JsonResponse
	{
		return new JsonResponse($this->getRequestOk(), $this->getMessage());
	}
}

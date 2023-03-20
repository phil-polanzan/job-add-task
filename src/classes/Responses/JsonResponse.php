<?php

namespace App\Responses;

class JsonResponse extends Response
{
	public function printMessage() : void
	{
		echo json_encode([
			'status' => $this->getStatus(),
			'message' => $this->getMessage()
		]);
	}
}

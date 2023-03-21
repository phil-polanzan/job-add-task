<?php

namespace App\Responses;

class JsonResponse extends Response
{
	public function printData() : void
	{
		echo json_encode($this->getData());
	}
}

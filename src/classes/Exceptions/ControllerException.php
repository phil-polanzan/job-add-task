<?php

namespace App\Exceptions;

class ControllerException extends AppException
{
	public function __construct(string $controllerClass)
	{
		parent::__construct("$controllerClass not found", 'ControllerRetrieving');
	}
}

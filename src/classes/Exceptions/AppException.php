<?php

namespace App\Exceptions;

use Exception;

class AppException extends Exception
{
	public function __construct(string $message, string $type)
	{
		parent::__construct("$type ERROR $message");
	}
}
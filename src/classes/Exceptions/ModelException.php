<?php

namespace App\Exceptions;

class ModelException extends AppException
{
	public function __construct(string $message)
	{
		parent::__construct($message, 'ModelSetting');
	}
}

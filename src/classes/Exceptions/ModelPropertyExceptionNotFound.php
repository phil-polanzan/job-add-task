<?php

namespace App\Exceptions;

class ModelPropertyExceptionNotFound extends AppException
{
	public function __construct(string $message) {
		parent::__construct($message, 'ModelProperty');
	}
}


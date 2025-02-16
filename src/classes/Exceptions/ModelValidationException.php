<?php

namespace App\Exceptions;
use App\Models\Model;

class ModelValidationException extends AppException
{
	public function __construct(Model $object, string $message)
	{
		parent::__construct($object::class . ": $message", 'ModelValidation');
	}
}

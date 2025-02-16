<?php

namespace App\Exceptions;

use App\ModelProperties\Property;

class ModelPropertyException extends AppException
{
	public function __construct(Property $property, string $message)
	{
		parent::__construct($property::class . " {$property->getName()}: $message", 'ModelProperty');
	}
}


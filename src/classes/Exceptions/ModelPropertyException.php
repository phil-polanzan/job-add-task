<?php

namespace App\Exceptions;

use App\ModelProperties\Property;

class ModelPropertyException extends AppException
{
	public function __construct(Property $property, string $message)
	{
		parent::__construct(get_class($property) . " {$property->getName()}: $message", 'ModelProperty');
	}
}


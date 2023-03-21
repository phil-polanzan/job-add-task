<?php

namespace App\Exceptions;

class ClassNotFoundException extends AppException
{
	public function __construct(string $className, string $type)
	{
		parent::__construct("Class $className not found", $type);
	}
}

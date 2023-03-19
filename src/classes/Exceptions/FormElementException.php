<?php

namespace App\Exceptions;

class FormElementException extends AppException
{
	public function __construct(string $message) {
		parent::__construct($message, 'FormElement');
	}

}
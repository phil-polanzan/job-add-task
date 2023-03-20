<?php

namespace App\Exceptions;

class HtmlElementException extends AppException
{
	public function __construct(string $message) {
		parent::__construct($message, 'FormElement');
	}
}

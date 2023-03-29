<?php

namespace App\Exceptions;

class FormException extends AppException
{
	public function __construct(string $message)
	{
		parent::__construct($message, 'FormSetting');
	}
}

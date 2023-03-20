<?php

namespace App\Responses;

abstract class Response
{
	const TYPE_ERROR = 'Error';
	const TYPE_SUCCESS = 'Success';

	private string $type;
	private string $message;

	public function setType(?string $type) : void
	{
		$this->type = $type ?? self::TYPE_SUCCESS;
	}

	public function getType() : string
	{
		return $this->type;
	}

	public function setMessage(string $message) : void
	{
		$this->message = $message;
	}

	public function getMessage() : string
	{
		return "{$this->type} : {$this->message}";
	}

	abstract public function printMessage() : void;
}

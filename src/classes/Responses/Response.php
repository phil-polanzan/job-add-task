<?php

namespace App\Responses;

abstract class Response
{
	const STATUS_ERROR = 'Error';
	const sTATUS_SUCCESS = 'Success';

	private string $status;
	private string $message;

	public function setStatus(?string $status) : void
	{
		$this->status = $status ?? self::sTATUS_SUCCESS;
	}

	public function getStatus() : string
	{
		return $this->status;
	}

	public function setMessage(string $message) : void
	{
		$this->message = $message;
	}

	public function getMessage() : string
	{
		return "{$this->status} : {$this->message}";
	}

	abstract public function printMessage() : void;
}

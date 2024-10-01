<?php

namespace App\Responses;

class Response
{
	const STATUS_ERROR = 'Error';
	const STATUS_SUCCESS = 'Success';

	private string $status;
	private string $message;

	public function __construct(bool $status, string $message)
	{
		$this->status = $status ? self::STATUS_SUCCESS : self::STATUS_ERROR;
		$this->message = $message;
	}

	public function getStatus() : string
	{
		return $this->status;
	}

	public function getMessage() : string
	{
		return $this->message;
	}

	public function printData() : void
	{
		echo '<pre>';
		print_r($this->getData());
		echo '</pre>';
	}

	public function getData() : array
	{
		return [
			'status' => $this->getStatus(),
			'message' => $this->getMessage()
		];
	}
}

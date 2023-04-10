<?php

namespace App\Responses;

class Response
{
	const STATUS_ERROR = 'Error';
	const STATUS_SUCCESS = 'Success';

	private string $status;
	private string $message;

	public function setStatus(?string $status) : void
	{
		$this->status = $status ?? self::STATUS_SUCCESS;
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

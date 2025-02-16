<?php

namespace App\Requests;

use App\Responses\Response;

abstract class Request
{
	private bool $requestOk = false;
	private string $message = '';

	public abstract function exec(array $args) :void;

	public function getRequestOk() : bool
	{
		return $this->requestOk;
	}

	protected function setRequestOk(bool $value) : void
	{
		$this->requestOk = $value;
	}

	public function getMessage() : string
	{
		return $this->message;
	}

	protected function setMessage(string $msg) : void
	{
		$this->message = $msg;
	}

	public function getResponse() : Response
	{
		return new Response($this->getRequestOk(), $this->getMessage());
	}
}

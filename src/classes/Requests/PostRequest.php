<?php

namespace App\Requests;

use App\Exceptions\ClassNotFoundException;
use App\Factories\ControllerFactory;
use App\Responses\Response;
use Exception;

abstract class PostRequest
{
	private bool $requestOk = false;
	private string $message = '';

	public function exec(array $args) : void
	{
		try {
			$controller = ControllerFactory::getInstance($args['controller'] ?? null);

			if (!$this->requestOk = $controller->processed($_POST)) {
				throw new Exception('Model validation error');
			}

			$this->message = 'Data submitted successfully';
		} catch (ClassNotFoundException $e) {
			$this->message = 'Unexpected Error';
		} catch (Exception $e) {
			$this->message = 'Submitted values not valid';
		} finally {
			$this->finally();
		}
	}

	protected function getRequestOk() : bool
	{
		return $this->requestOk;
	}

	protected function getMessage() : string
	{
		return $this->message;
	}

	protected function finally()
	{
		$response = new Response();

		return $response->getData();
	}
}

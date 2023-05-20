<?php

namespace App\Requests;

use App\Exceptions\ClassNotFoundException;
use App\Factories\ControllerFactory;
use Exception;

class PostRequest extends Request
{
	public function exec(array $args) : void
	{
		try {
			$controller = ControllerFactory::getInstance($args['controller'] ?? null);
			$this->setRequestOk($controller->processed($_POST));

			if (!$this->getRequestOk()) {
				throw new Exception('Model validation error');
			}

			$this->setMessage('Data submitted successfully');
		} catch (ClassNotFoundException $e) {
			$this->setMessage('Unexpected Error');
		} catch (Exception $e) {
			$this->setMessage('Submitted values not valid');
		} finally {
			$this->finally();
		}
	}
}

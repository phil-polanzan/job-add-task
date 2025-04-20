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
			$args['controller'] ??= null;
			$controller = ControllerFactory::getInstance($args['controller']);
			unset($args['controller']);
			$this->setRequestOk($controller->processed($args));

			if (!$this->getRequestOk()) {
				throw new Exception('Model validation error');
			}

			$this->setMessage('Data submitted successfully');
		} catch (ClassNotFoundException) {
			$this->setMessage('Unexpected Error');
		} catch (Exception) {
			$this->setMessage('Submitted values not valid');
		}
	}
}

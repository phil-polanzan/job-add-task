<?php

namespace App\Controllers;

use App\Exceptions\ControllerException;

class ControllerParser
{
	/**
	 * @throws ControllerException
	 */
	public static function getInstance(?string $controller) : Controller
	{
		$controller = implode('', array_map('ucfirst', array_map('strtolower', explode('_', $controller))));
		$className = "App\Controllers\\$controller";

		if (!class_exists($className)) {
			throw new ControllerException($className);
		}

		return new $className();
	}
}

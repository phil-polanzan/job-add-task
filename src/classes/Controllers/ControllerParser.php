<?php

namespace App\Controllers;

use App\Exceptions\ClassNotFoundException;

class ControllerParser
{
	/**
	 * @throws ClassNotFoundException
	 */
	public static function getInstance(?string $controller) : Controller
	{
		$controller = implode('', array_map('ucfirst', array_map('strtolower', explode('_', $controller))));
		$className = "App\Controllers\\$controller";

		if (!class_exists($className)) {
			throw new ClassNotFoundException($className, 'ControllerRetrieving');
		}

		return new $className();
	}
}

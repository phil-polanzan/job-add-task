<?php

namespace App\Forms;

use App\Exceptions\ClassNotFoundException;

class FormFactory
{
	/**
	 * @throws ClassNotFoundException
	 */
	public static function getInstance($formType, $objArgs)
	{
		$form = implode('', array_map('ucfirst', array_map('strtolower', explode('-', $formType))));
		$className = "App\Forms\\{$form}Form";

		if (!class_exists($className)) {
			throw new ClassNotFoundException($className, 'FormRetrieving');
		}

		return new $className(...$objArgs);
	}
}

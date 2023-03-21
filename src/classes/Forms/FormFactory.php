<?php

namespace App\Forms;

class FormFactory
{
	public static function getInstance($formType, $objArgs)
	{
		$form = implode('', array_map('ucfirst', array_map('strtolower', $formType)));
		$className = "App\Forms\\{$form}Form";

		if (!class_exists($className)) {
			throw new ControllerException($className);
		}

		return new $className($objArgs);

	}
}

<?php

namespace App\Factories;

use App\Exceptions\ClassNotFoundException;

abstract class Factory
{

	protected static function getClassName(string $formType): string
	{
		return implode('', array_map('ucfirst', array_map('strtolower', explode('-', $formType))));
	}

	/**
	 * @throws ClassNotFoundException
	 */
	protected static function parse(string $nameSpace, string $tag, array $objArgs = [])
	{
		$className = $nameSpace . '\\' . static::getClassName($tag);

		if (!class_exists($className)) {
			$errorType = end(explode('\\', $nameSpace)) . 'Retrieving';
			throw new ClassNotFoundException($className, $errorType);
		}

		return new $className(...$objArgs);
	}

	public abstract static function getInstance(string $tag, array $objArgs = []);
}

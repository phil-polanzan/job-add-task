<?php

namespace App\Factories;

use App\Exceptions\ClassNotFoundException;

abstract class Factory
{
	protected static function getClassName(string $formType): string
	{
		return implode('', array_map('ucfirst', array_map('strtolower', explode('-', $formType))));
	}

	protected abstract static function getNameSpace(): string;

	/**
	 * @throws ClassNotFoundException
	 */
	public static function getInstance(string $tag, array $objArgs = [])
	{
		$nameSpace = static::getNameSpace();
		$className = $nameSpace . '\\' . static::getClassName($tag);

		if (!class_exists($className)) {
			$class = explode('\\', $nameSpace);
			throw new ClassNotFoundException($className, end($class) . ' Retrieving');
		}

		return new $className(...$objArgs);
	}
}

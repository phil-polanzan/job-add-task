<?php

namespace App\Models;

use App\Exceptions\ModelException;
use App\Exceptions\ModelPropertyExceptionNotFound;
use App\ModelProperties\Property;

class Model
{
	private array $properties = [];

	/**
	 * @throws ModelPropertyExceptionNotFound
	 */
	public function __get(string $key) : Property
	{
		if (!$prop = $this->properties[$key]) {
			throw new ModelPropertyExceptionNotFound("$key not found");
		}

		return $prop;
	}

	public function setProperties(array $properties) : void
	{
		foreach ($properties as $property) {
			if (!is_object($property) || !is_subclass_of($property::class, 'App\ModelProperties\Property')) {
				throw new ModelException("Error on setting properties");
			}

			$this->properties[$property->getName()] = $property;
		}
	}

	public function getProperties() : array
	{
		return $this->properties;
	}

	public function validate() : bool
	{
		foreach ($this->properties as $key => $property) {
			if (!$property->validate()) {
				return false;
			}
		}

		return true;
	}

	public function setPropertiesValues(array $values) : void
	{
		foreach ($this->properties as $key => $property) {
			$property->setValue($values[$key] ?? null);
			$property->sanitise();
		}
	}
}

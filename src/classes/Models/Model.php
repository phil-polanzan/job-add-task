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
			if (!is_object($property) || !is_subclass_of(get_class($property), 'App\ModelProperties\Property')) {
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
		$valid = true;

		foreach ($this->properties as $key => $property) {
			if (!$property->validate()) {
				$valid = false;
				break;
			}
		}

		return $valid;
	}

	public function setPropertiesValues(array $values)
	{
		foreach ($this->properties as $key => $property) {
			$values[$key] ??= null;
			$property->setValue($values[$key]);
			$property->sanitise();
		}
	}
}

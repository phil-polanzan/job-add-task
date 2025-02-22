<?php

namespace App\ModelProperties;

use App\Exceptions\ModelPropertyException;

abstract class Property
{
	private readonly string $name;
	private readonly bool $emptyValueAllowed;
	private $value;

	public function __construct(string $name, bool $emptyValueAllowed = true)
	{
		$this->name = $name;
		$this->emptyValueAllowed = $emptyValueAllowed;
	}

	public abstract function sanitise() : void;

	public function getName() : string
	{
		return $this->name;
	}

	public function setValue($value) : void
	{
		// if the value is null it will be set to empty string
		$this->value = $value ?? '';

		if (!is_scalar($this->value)) {
			$this->throwException('Value type not valid');
		}
	}

	public function getValue()
	{
		return $this->value;
	}

	public function isEmptyValueAllowed() : bool
	{
		return $this->emptyValueAllowed;
	}

	public function validate() : bool
	{
		return !(!$this->isEmptyValueAllowed() && empty($this->value));
	}

	/**
	 * @throws ModelPropertyException
	 */
	protected function throwException(string $message = 'Not valid value') : void
	{
		throw new ModelPropertyException($this, $message);
	}
}

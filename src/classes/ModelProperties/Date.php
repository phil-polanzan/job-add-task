<?php

namespace App\ModelProperties;

use DateTime;

class Date extends Property
{
	const FORMAT_STD = 'Y-m-d';

	public function __construct(string $name, bool $emptyValueAllowed = true)
	{
		parent::__construct($name, $emptyValueAllowed);
	}

	public function sanitise() : void
	{
		$this->setValue(trim($this->getValue()));
	}

	public function validate() : bool
	{
		$value = parent::validate() && !is_null(DateTime::createFromFormat(self::FORMAT_STD, $this->getValue()));

		if (!empty($this->getValue())) {
			$parts = explode('-', $this->getValue());
			$value = $value && checkdate($parts[1], $parts[2], $parts[0]);
		}

		return $value;
	}

	public function notEmpty() : bool
	{
		return !empty($this->getValue());
	}

	public function greater(Date $object) : bool
	{
		if ($this->notEmpty() && $object->notEmpty()) {
			$dt0 = DateTime::createFromFormat(self::FORMAT_STD, $this->getValue());
			$dt1 = DateTime::createFromFormat(self::FORMAT_STD, $object->getValue());

			return  $dt0 > $dt1;
		}

		return false;
	}
}

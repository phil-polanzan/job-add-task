<?php

namespace App\ModelProperties;

use DateTime;

class Date extends Property
{
	const string FORMAT_STD = 'Y-m-d';

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
		$value = $this->getValue();
		$dateObj = DateTime::createFromFormat(self::FORMAT_STD, $value);

		if (!($this->notEmpty() && parent::validate() && !is_null($dateObj) && !empty($dateObj))) {
			return false;
		}

		$parts = explode('-', $value);

		return checkdate($parts[1], $parts[2], $parts[0]);
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

			return $dt0 > $dt1;
		}

		return false;
	}
}

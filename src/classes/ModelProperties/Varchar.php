<?php

namespace App\ModelProperties;

class Varchar extends Property
{
	const MAX_LENGTH = 255;

	private int $length;

	public function __construct(string $name, ?int $length = null, bool $emptyValueAllowed = true)
	{
		parent::__construct($name, $emptyValueAllowed);
		$this->setLength($length);
	}

	public function setLength(?int $length) : void
	{
		$this->length = $length ?? self::MAX_LENGTH;

		if ($this->length < 0) {
			$this->throwException('Value smaller than allowed');
		} elseif ($this->length > self::MAX_LENGTH) {
			$this->throwException('Value greater than allowed');
		}
	}

	public function getLength() : int
	{
		return $this->length;
	}

	public function sanitise() : void
	{
		$this->setValue(trim($this->getValue()));
	}

	public function validate() : bool
	{
		return parent::validate() && strlen($this->getValue()) <= $this->length;
	}
}

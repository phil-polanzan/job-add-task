<?php

namespace App\ModelProperties;

class Numeric extends Property
{
	const TYPE_FLOAT = 'float';
	const TYPE_INT = 'integer';
	const TYPES = [
		self::TYPE_FLOAT,
		self::TYPE_INT
	];

	private string $type;
	private $minValue = null;
	private $maxValue = null;

	public function __construct(string $name, ?string $type = null, bool $emptyValueAllowed = true)
	{
		parent::__construct($name, $emptyValueAllowed);
		$this->setType($type);
	}

	private function setType(?string $type) {
		$this->type = $type ?? self::TYPE_INT;

		if (!in_array($this->type, self::TYPES)) {
			$this->throwException();
		}
	}

	public function getType() : string
	{
		return $this->type;
	}

	private function isRangeValueValid() : bool
	{
		if (!is_null($this->minValue) && !is_null($this->maxValue)) {
			return $this->minValue <= $this->maxValue;
		}

		return true;
	}

	public function setMinValue($value) : void
	{
		$this->minValue = $this->castValue($value);

		if (!is_null($this->maxValue) && !$this->isRangeValueValid()) {
			$this->throwException('Value greater than allowed');
		}
	}

	public function getMinValue()
	{
		return $this->minValue;
	}

	public function setMaxValue($value) : void
	{
		$this->maxValue = $this->castValue($value);

		if (!is_null($this->minValue) && !$this->isRangeValueValid()) {
			$this->throwException('Value smaller than allowed');
		}
	}

	public function getMaxValue()
	{
		return $this->maxValue;
	}

	private function castValue($value)
	{
		return $this->getType() == self::TYPE_INT ? (int)$value : (float)$value;
	}

	public function sanitise() : void
	{
		$this->setValue($this->castValue($this->getValue()));
	}

	public function validate() : bool
	{
		$value = $this->getValue();

		return parent::validate()
			&& !(!is_null($this->minValue) && $this->minValue > $value)
			&& !(!is_null($this->maxValue) && $value > $this->maxValue);
	}
}

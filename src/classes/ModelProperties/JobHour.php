<?php

namespace App\ModelProperties;

class JobHour extends Numeric
{
	const float UNIT_QUARTER_HOUR = 0.25;
	const float UNIT_HALF_HOUR = 0.5;
	const int UNIT_HOUR = 1;
	const array UNITS = [
		self::UNIT_QUARTER_HOUR,
		self::UNIT_HALF_HOUR,
		self::UNIT_HOUR
	];

	/**
	 * value granularity; e.g. if step is 0.5 legal values will be 0, 0.5, 1 ...
	 */
	private float $step;

	public function __construct(string $name, ?float $step = null, bool $emptyValueAllowed = true)
	{
		parent::__construct($name, parent::TYPE_FLOAT, $emptyValueAllowed);
		$this->setMinValue(0);
		$this->setStep($step);
	}

	private function setStep(?float $step) : void
	{
		$this->step = $step ?? self::UNIT_HOUR;

		if (!in_array($this->step, self::UNITS)) {
			$this->throwException();
		}
	}

	public function getStep() : float
	{
		return $this->step;
	}

	public function validate() : bool
	{
		$fraction = $this->getValue() / $this->step;

		return parent::validate() && ($fraction == (int)$fraction);
	}
}

<?php

namespace App\FormElements;

class NumericInput extends Input
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, 'number', $label, $value);
		$this->addAttributeKeys(['min', 'step']);
	}
}

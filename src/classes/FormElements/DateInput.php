<?php

namespace App\FormElements;

class DateInput extends Input
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, 'text', $label, $value);
		$this->addAttributeKeys(['data-date-format']);
		$this->templateFile = 'date_input.php';
	}
}

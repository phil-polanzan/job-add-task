<?php

namespace App\FormElements;

class CheckBox extends Input
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, 'checkbox', $label, $value);
		$this->templateFile = 'checkbox_input.php';
	}
}
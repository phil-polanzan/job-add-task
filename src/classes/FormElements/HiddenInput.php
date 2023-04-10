<?php

namespace App\FormElements;

class HiddenInput extends Input
{
	public function __construct(string $name, $value)
	{
		parent::__construct($name, 'hidden', null, $value);
		$this->templateFile = 'hidden_input.php';
	}
}

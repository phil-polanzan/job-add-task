<?php

namespace App\FormElements;

class SubmitButton extends Button
{
	public function __construct(string $name, string $type, ?string $label, $value = null)
	{
		parent::__construct($name, 'submit');
	}

}
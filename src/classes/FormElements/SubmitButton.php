<?php

namespace App\FormElements;

class SubmitButton extends Button
{
	public function __construct(string $label)
	{
		parent::__construct($label, 'submit');
	}
}

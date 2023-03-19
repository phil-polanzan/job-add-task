<?php

namespace App\FormElements;

class TextInput extends Input
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, 'text', $label, $value);
		$this->addAttributeKeys(['maxlength']);
	}
}

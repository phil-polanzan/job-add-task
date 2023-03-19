<?php

namespace App\FormElements;

abstract class Input extends FormElement
{
	public function __construct(string $name, string $type, ?string $label, $value = null)
	{
		parent::__construct($name, $label);
		$this->addAttributeKeys(['type', 'value']);
		$this->addAttributes([
			'type' => $type,
			'value' => $value
		]);
		$this->setTemplateFile('input.php');
	}
}

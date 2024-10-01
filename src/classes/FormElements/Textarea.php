<?php

namespace App\FormElements;

class Textarea extends VariableFormElement
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, $label, $value);
		$this->addAttributeKeys(['maxlength', 'value']);
		$this->addAttributes([
			'value' => $value
		]);
		$this->templateFile = 'textarea.php';
	}
}

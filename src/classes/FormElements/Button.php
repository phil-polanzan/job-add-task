<?php

namespace App\FormElements;

class Button extends FormElement
{
	public function __construct(string $label, string $type)
	{
		parent::__construct($label);
		$this->addAttributeKeys(['type']);
		$this->addAttributes([
			'type' => $type,
			'class' => 'btn btn-primary'
		]);
		$this->templateFile = 'button.php';
	}
}

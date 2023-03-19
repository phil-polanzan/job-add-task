<?php

namespace App\FormElements;

use App\Html\HtmlElement;

class Button extends HtmlElement
{
	public function __construct(string $label, string $type)
	{
		parent::__construct($label);
		$this->addAttributeKeys(['type']);
		$this->addAttributes([
			'type' => $type,
			'class' => 'btn btn-primary'
		]);
		$this->setTemplateFile('button.php');
	}
}

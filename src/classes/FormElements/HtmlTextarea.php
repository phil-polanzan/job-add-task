<?php

namespace App\FormElements;

class HtmlTextarea extends Textarea
{
	public function __construct(string $name, ?string $label, $value = null)
	{
		parent::__construct($name, $label, $value);
		$this->setTemplateFile('htmlarea.php');
	}
}

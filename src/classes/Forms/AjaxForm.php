<?php

namespace App\Forms;

class AjaxForm extends Form
{
	public function __construct(string $label, ?string $action = null, ?string $method = null)
	{
		parent::__construct($label, $action, $method);
		$this->templateFile = 'form.php';
	}
}

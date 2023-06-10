<?php

namespace App\Forms;

use App\FormElements\HiddenInput;

class AjaxPostForm extends Form
{
	private string $controllerName;

	public function __construct(string $label, ?string $controllerName = null)
	{
		parent::__construct($label, 'src/files/requests/ajax-post.php', self::METHOD_POST);
		$this->controllerName = $controllerName ?? 'ajax-post';
		$this->templateFile = 'ajax.php';
	}

	public function setElements(array $elements) : void
	{
		parent::setElements(array_merge(
			[new HiddenInput('controller', "{$this->controllerName}-controller")], $elements
		));
	}
}

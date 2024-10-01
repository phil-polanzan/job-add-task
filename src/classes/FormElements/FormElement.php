<?php

namespace App\FormElements;

use App\Html\HtmlElement;

abstract class FormElement extends HtmlElement
{
	protected function getFileDirectoryPath() : string
	{
		return '/templates/form-elements/fields';
	}
}
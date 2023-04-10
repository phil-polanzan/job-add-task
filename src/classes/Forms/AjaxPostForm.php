<?php

namespace App\Forms;

class AjaxPostForm extends Form
{
	public function __construct(string $label)
	{
		parent::__construct($label, 'src/files/requests/ajax-post.php', self::METHOD_POST);
	}
}

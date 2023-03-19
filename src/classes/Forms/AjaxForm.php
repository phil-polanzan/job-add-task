<?php

namespace App\Forms;

class AjaxForm extends Form
{
	public function getAlerts() : array
	{
		return [
			'templates/inc/form-success-alert.php',
			'templates/inc/form-danger-alert.html'
		];
	}
}

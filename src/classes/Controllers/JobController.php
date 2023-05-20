<?php

namespace App\Controllers;

class JobController extends ModelController implements Controller
{
	public function processed(array $values) : bool
	{
		return parent::validateModel('Job', $values);
	}
}

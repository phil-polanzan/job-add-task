<?php

namespace App\Controllers;

use App\Models\Job;

class JobController implements Controller
{
	public function processed(array $values) : bool
	{
		$job = new Job();
		$job->setPropertiesValues($values);
		return $job->validate();
	}
}

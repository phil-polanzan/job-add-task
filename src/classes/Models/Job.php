<?php

namespace App\Models;

use App\ModelProperties\Date;
use App\ModelProperties\JobHour;
use App\ModelProperties\Varchar;

class Job extends Model
{
	public function __construct()
	{
		$this->setProperties([
			new Varchar('title', 50, false),
			new Varchar('description'),
			new JobHour('estimated_hours', JobHour::UNIT_HALF_HOUR),
			new Date('entry_date', false),
			new Date('schedule_start_date'),
			new Date('schedule_end_date')
		]);
	}

	public function validate() : bool
	{
		return parent::validate() && !$this->schedule_start_date->greater($this->schedule_end_date);
	}
}

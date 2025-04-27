<?php

namespace Unittests\ModelProperties;

use App\Exceptions\AppException;
use App\ModelProperties\JobHour;

class JobHourTest extends ModelPropertiesTest
{
	public function testNotValidStep(): void
	{
		try {
			$jobHour = new JobHour('test', 0.3);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testSuccess(): void
	{
		$jobHour = new JobHour('test', JobHour::UNIT_HALF_HOUR);
		$this->assertInstanceOf(JobHour::class, $jobHour);
	}
}

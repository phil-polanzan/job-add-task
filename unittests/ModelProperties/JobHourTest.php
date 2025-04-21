<?php

namespace Unittests\ModelProperties;

use App\Exceptions\AppException;
use App\ModelProperties\JobHour;

class JobHourTest extends ModelPropertiesTest
{
	private JobHour $jobHour;

	public function testNotValidStep(): void {
		try {
			$this->jobHour = new JobHour('test', 0.3);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testSuccess(): void {
		$this->jobHour = new JobHour('test', JobHour::UNIT_HALF_HOUR);
		$this->assertInstanceOf(JobHour::class, $this->jobHour);
	}
}

<?php

namespace Unittests\ModelProperties;

use App\Exceptions\AppException;
use App\ModelProperties\Date;

class DateTest extends ModelPropertiesTest
{
	public function testNotValidStringValue() : void {
		$date = new Date('test');
		$date->setValue('not_valid_value');
		$this->assertFalse($date->validate());
	}

	public function testMalformattedDateValue() : void {
		$date = new Date('test');
		$date->setValue('21-04-2025');
		$this->assertFalse($date->validate());
	}

	public function testNotExistingDateValue() : void {
		$date = new Date('test');
		$date->setValue('2025-04-31');
		$this->assertFalse($date->validate());
	}

	public function testISuccess() : void {
		$date = new Date('test');
		$date->setValue('2025-04-30');
		$this->assertTrue($date->validate());
	}
}

<?php

namespace Unittests\ModelProperties;

use App\Exceptions\AppException;
use App\ModelProperties\Numeric;

class NumericTest extends ModelPropertiesTest
{
	public function testNotValidMax(): void {
		try {
			$numeric = new Numeric('test');
			$numeric->setMinValue(8);
			$numeric->setMaxValue(7.5);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testNotValidMin(): void {
		try {
			$numeric = new Numeric('test');
			$numeric->setMaxValue(7.5);
			$numeric->setMinValue(8);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testNotValidType(): void {
		try {
			$numeric = new Numeric('test', 'double');
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testSuccess(): void {
		$numeric = new Numeric('test', Numeric::TYPE_FLOAT);
		$this->assertInstanceOf(Numeric::class, $numeric);
	}
}

<?php

namespace Unittests\ModelProperties;

use App\Exceptions\AppException;
use App\ModelProperties\Varchar;

class VarcharTest extends ModelPropertiesTest
{
	public function testNegativeLength() : void
	{
		try {
			$varchar = new Varchar('test', -1);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testOutOfLength() : void
	{
		try {
			$varchar = new Varchar('test', 256);
		} catch (AppException $e) {
			$this->assertEqualsModelPropertyException($e);
		}
	}

	public function testSuccess() : void
	{
		$varchar = new Varchar('test', 50);
		$this->assertInstanceOf(Varchar::class, $varchar);
	}
}

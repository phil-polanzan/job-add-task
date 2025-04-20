<?php

namespace Unittests\ModelProperties;

use App\Exceptions\ModelPropertyException;
use PHPUnit\Framework\TestCase;

class ModelPropertiesTest extends TestCase
{
	protected function assertEqualsModelPropertyException(\Exception $exception) : void {
		$this->assertInstanceOf(ModelPropertyException::class, $exception);
	}
}
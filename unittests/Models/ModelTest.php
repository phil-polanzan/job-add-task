<?php

namespace Unittests\Models;

use App\Exceptions\AppException;
use App\Exceptions\ModelException;
use App\ModelProperties\Varchar;
use App\Models\Model;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
	public function testNotValidProperty() : void {
		try {
			$object = new Model();
			$object->setProperties([
				new Varchar('test', 10),
				'random'
			]);
		} catch(AppException $e) {
			$this->assertInstanceOf(ModelException::class, $e);
		}
	}
}

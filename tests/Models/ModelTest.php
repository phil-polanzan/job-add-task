<?php

namespace Unittests\Models;

use App\Exceptions\AppException;
use App\Exceptions\ModelException;
use App\ModelProperties\Varchar;
use App\Models\Model;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
	public function testNotValidProperty() : void
	{
		try {
			$model = new Model();
			$model->setProperties([
				new Varchar('test', 10),
				'random'
			]);
		} catch (AppException $e) {
			$this->assertInstanceOf(ModelException::class, $e);
		}
	}
}

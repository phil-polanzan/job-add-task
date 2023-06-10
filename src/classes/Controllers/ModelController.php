<?php

namespace App\Controllers;

class ModelController
{
	public function validateModel(string $modelClassName, array $values) : bool
	{
		$modelClasNamespace = "App\Models\\$modelClassName";
		$model = new $modelClasNamespace();
		$model->setPropertiesValues($values);

		return $model->validate();
	}
}

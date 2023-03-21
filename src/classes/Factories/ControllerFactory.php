<?php

namespace App\Factories;

use App\Controllers\Controller;

class ControllerFactory extends Factory
{
	public static function getInstance(string $tag, array $objArgs = []) : Controller
	{
		return static::parse('App\Controllers', $tag, $objArgs);
	}
}

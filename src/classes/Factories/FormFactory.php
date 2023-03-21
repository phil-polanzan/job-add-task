<?php

namespace App\Factories;

use App\Forms\Form;

class FormFactory extends Factory
{
	public static function getInstance(string $tag, array $objArgs = []) : Form
	{
		return static::parse('App\Forms', $tag, $objArgs);
	}
}

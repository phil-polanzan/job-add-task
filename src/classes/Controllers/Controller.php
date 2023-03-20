<?php

namespace App\Controllers;

interface Controller
{
	public function processed(array $values) : bool;
}

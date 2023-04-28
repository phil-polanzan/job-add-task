<?php

use App\ModelProperties\Varchar;
use App\Models\Model;
use App\Terminal\Messenger;

Messenger::info('Model with wrong properties');
$object = new Model();
$object->setProperties([
	new Varchar('test', 10),
	'random'
]);

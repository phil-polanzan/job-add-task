<?php

use App\ModelProperties\Numeric;
use App\Terminal\Messenger;

Messenger::printInfo('Numeric with not valid minimum value');
$object = new Numeric('test');
$object->setMaxValue(7.5);
$object->setMinValue(8);

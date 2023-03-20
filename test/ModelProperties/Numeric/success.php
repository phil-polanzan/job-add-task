<?php

use App\ModelProperties\Numeric;
use App\Terminal\Messenger;

Messenger::printInfo('Numeric with valid properties');
$object = new Numeric('test', Numeric::TYPE_FLOAT);
$object->setMinValue(2.5);
$object->setMaxValue(7.5);

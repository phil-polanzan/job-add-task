<?php

use App\ModelProperties\Numeric;
use App\Terminal\Messenger;

Messenger::info('Numeric with not valid maximum value');
$object = new Numeric('test');
$object->setMinValue(8);
$object->setMaxValue(7.5);

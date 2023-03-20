<?php

use App\ModelProperties\Numeric;
use App\Terminal\Messenger;

Messenger::printInfo('Numeric with not valid type');
$object = new Numeric('test', 'double');

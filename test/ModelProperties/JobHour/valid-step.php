<?php

use App\ModelProperties\JobHour;
use App\Terminal\Messenger;

Messenger::printInfo('JobHour with valid step');
$object = new JobHour('test', JobHour::UNIT_HALF_HOUR);

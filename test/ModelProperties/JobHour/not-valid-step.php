<?php

use App\ModelProperties\JobHour;
use App\Terminal\Messenger;

Messenger::printInfo('JobHour with not valid step');
$object = new JobHour('test', 0.3);

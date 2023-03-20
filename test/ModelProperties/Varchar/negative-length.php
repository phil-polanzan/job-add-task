<?php

use App\ModelProperties\Varchar;
use App\Terminal\Messenger;

Messenger::printInfo('Varchar with negative length');
$object = new Varchar('test', -1);

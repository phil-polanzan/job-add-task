<?php

use App\ModelProperties\Varchar;
use App\Terminal\Messenger;

Messenger::printInfo('Varchar with out of range length');
$object = new Varchar('test', 256);

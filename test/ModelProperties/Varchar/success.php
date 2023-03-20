<?php

use App\ModelProperties\Varchar;
use App\Terminal\Messenger;

Messenger::printInfo('Varchar with valid length');
$object = new Varchar('test', 50);

<?php

use App\ModelProperties\Varchar;
use App\Terminal\Messenger;

Messenger::info('Varchar with negative length');
$object = new Varchar('test', -1);

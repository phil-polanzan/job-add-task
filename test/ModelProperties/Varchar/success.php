<?php

use App\ModelProperties\Varchar;
use App\Terminal\Messenger;

Messenger::info('Varchar with valid length');
$object = new Varchar('test', 50);

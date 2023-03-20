<?php
require dirname(__DIR__, 3) . '/bootstrap-app.php';

use App\Requests\AsyncPostRequest;

$request = new AsyncPostRequest();
$request->exec($_POST);

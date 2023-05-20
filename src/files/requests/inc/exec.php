<?php
require dirname(__DIR__, 4) . '/bootstrap-app.php';
$request = new $requestClassName();
$request->exec($_POST);

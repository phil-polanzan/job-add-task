<?php
require 'bootstrap-app.php';

extract([
	'formType' => 'model',
	'model' => 'job',
	'formAction' => 'add'
]);

$file = include ROOT_PATH . "/src/files/forms/$formType/$model/$formAction.php";

if (file_exists($file)) {
	require $file;
} else {
	require ROOT_PATH . '/src/files/forms/entry.php';
}


<?php
require 'bootstrap-app.php';

extract([
	'formType' => 'job-add',
	'objArgs' => ['Add New Job', null]
]);

$file = include ROOT_PATH . "/src/files/forms/$formType/$model/$formAction.php";

if (file_exists($file)) {
	require $file;
} else {
	require ROOT_PATH . '/src/files/forms/entry.php';
}


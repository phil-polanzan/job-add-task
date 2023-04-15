<?php
require 'bootstrap-app.php';

extract([
	'formType' => 'job-add-form',
	'objArgs' => ['Add New Job', null]
]);

$file = include ROOT_PATH . "/src/files/forms/$formType/$model/$formAction.php";
$file = file_exists($file) ? $file : ROOT_PATH . '/src/files/forms/entry.php';
require $file;

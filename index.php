<?php
require 'bootstrap-app.php';

extract([
	'formType' => 'job-add-form',
	'objArgs' => ['Add New Job', null]
]);
$customFile = isset($formType) && isset($model) && isset($formAction) ?
	ROOT_PATH . "/src/files/forms/$formType/$model/$formAction.php" : null;

require file_exists($customFile) ? $customFile : ROOT_PATH . '/src/files/forms/entry.php';;

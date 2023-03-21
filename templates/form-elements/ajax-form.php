<?php
$obj = $args['obj'];
$alertFiles = [
	'templates/inc/form-success-alert.php',
	'templates/inc/form-danger-alert.html'
];

foreach ($alertFiles as $file) {
	require ROOT_PATH . "/$file";
}

require ROOT_PATH . '/templates/form-elements/form.php';

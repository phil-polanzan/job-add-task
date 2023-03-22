<?php
/**
 * In this file global constants are defined
 */

$notIsCli = php_sapi_name() !== 'cli';

$constants = [
	'ROOT_PATH' => dirname(__DIR__, 3),
	'IS_CLI' => !$notIsCli,
	'ROOT_URL' => $notIsCli ? (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://{$_SERVER['HTTP_HOST']}" : ''
];

foreach ($constants as $key => $value) {
	if (!defined($key)) {
		define($key, $value);
	}
}

<?php
/**
 * In this file global constants are defined
 */

$rootPath = dirname(__DIR__, 3);
define('ROOT_PATH', $rootPath);

$isNotCli = php_sapi_name() !== 'cli';
define('IS_CLI', !$isNotCli);

if (!IS_CLI) {
	$rootPathUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://{$_SERVER['HTTP_HOST']}";
	define('ROOT_URL', $rootPathUrl);
}

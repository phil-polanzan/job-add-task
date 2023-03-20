<?php
/**
 * In this file global constants are defined
 */

use App\Exceptions\ConfigException;

$rootPath = dirname(__DIR__, 3);
define('ROOT_PATH', $rootPath);

if (php_sapi_name() !== 'cli') {
	$rootPathUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://{$_SERVER['HTTP_HOST']}";
	define('ROOT_URL', $rootPathUrl);
}

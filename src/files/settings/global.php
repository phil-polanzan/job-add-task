<?php
/**
 * In this file global constants are defined
 */

if (!defined('ROOT_PATH')) {
	define('ROOT_PATH', dirname(__DIR__, 3));
}

if (!defined('IS_CLI')) {
	define('IS_CLI', php_sapi_name() === 'cli');
}

if (!defined('ROOT_URL') && !IS_CLI) {
	define('ROOT_URL', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://{$_SERVER['HTTP_HOST']}");
}

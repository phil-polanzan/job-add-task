<?php
/**
 * In this file global constants are defined
 */

$rootPath = dirname(__DIR__, 3);
define('ROOT_PATH', $rootPath);

$rootPathUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://{$_SERVER['HTTP_HOST']}";
define('ROOT_URL', $rootPathUrl);

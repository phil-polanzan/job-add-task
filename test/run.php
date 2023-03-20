<?php
if (php_sapi_name() !== 'cli') {
	exit;
}

include dirname(__DIR__) . '/bootstrap-app.php';
use App\Terminal\Messenger;
use App\Exceptions\AppException;

$runTests = function($file) {
	$fileParts = array_map('strtolower', explode('.', $file));

	if (end($fileParts) != 'php') {
		return;
	}

	$ok = true;
	$msg = 'Success';

	try {
		include $file;
	} catch(AppException $e) {
		$ok = false;
		$msg = $e->getMessage();
	} finally {
		if ($ok) {
			Messenger::printSuccess($msg);
		} else {
			Messenger::printError($msg);
		}

		echo PHP_EOL, PHP_EOL;
	}
};

$skipFiles = ['.', '..', __FILE__];
$scanDir = function($target) use(&$scanDir, $skipFiles, $runTests) {
	if (is_dir($target)) {
		$files = glob( $target . '*', GLOB_MARK );

		foreach ($files as $file) {
			$scanDir($file);
		}
	} elseif (!in_array($target, $skipFiles)) {
		$runTests($target);
	}
};

$shellOpts = getopt(null, ['test-dir:']);
$testDir = isset($shellOpts['test-dir']) ? ROOT_PATH . "/test/{$shellOpts['test-dir']}" : __DIR__;
$scanDir($testDir);

<?php

namespace App\Terminal;

class Messenger
{
	const WARNING_TYPE = 'warning';
	const SUCCESS_TYPE = 'success';
	const ERROR_TYPE = 'error';
	const INFO_TYPE = 'info';

	private static array $colours = [
		self::WARNING_TYPE => '1;33',
		self::SUCCESS_TYPE => '0;32',
		self::ERROR_TYPE => '0;31',
		self::INFO_TYPE => '1;37'
	];

	public static function getMsg(string $msg, string $type) : string
	{
		return sprintf("\033[%sm[%s] %s\033[0m" . PHP_EOL,  self::$colours[$type], $type, $msg);
	}

	public static function printError(string $msg)
	{
		echo self::getMsg($msg, self::ERROR_TYPE);
	}

	public static function printSuccess(string $msg)
	{
		echo self::getMsg($msg, self::SUCCESS_TYPE);
	}

	public static function printInfo(string $msg)
	{
		echo self::getMsg($msg, self::INFO_TYPE);
	}

	public static function printWarning(string $msg)
	{
		echo self::getMsg($msg, self::WARNING_TYPE);
	}
}

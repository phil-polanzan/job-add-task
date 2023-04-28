<?php

namespace App\Terminal;

class Messenger
{
	public static function getMsg(string $msg, string $type, string $colour) : string
	{
		return sprintf("\033[%sm[%s] %s\033[0m" . PHP_EOL,  $colour, $type, $msg);
	}

	public static function error(string $msg)
	{
		echo self::getMsg($msg, 'Error', '0;31');
	}

	public static function success(string $msg)
	{
		echo self::getMsg($msg, 'Success', '0;32');
	}

	public static function info(string $msg)
	{
		echo self::getMsg($msg, 'Info', '1;37');
	}

	public static function warning(string $msg)
	{
		echo self::getMsg($msg, 'Warning', '1;33');
	}
}

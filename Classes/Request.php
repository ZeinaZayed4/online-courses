<?php

namespace App;

use JetBrains\PhpStorm\NoReturn;

class Request
{
	public static function get(?string $key = null): mixed
	{
		if ($key === null) {
			return $_GET;
		}
		return $_GET[$key] ?? null;
	}
	
	public static function post(?string $key = null): mixed
	{
		if ($key === null) {
			return $_POST;
		}
		return $_POST[$key] ?? null;
	}
	
	public static function method(): string
	{
		return $_SERVER['REQUEST_METHOD'] ?? 'GET';
	}
	
	public static function isPost(): bool
	{
		return self::method() === 'POST';
	}
	
	public static function filter(string $key): string
	{
		return trim(htmlspecialchars($key));
	}
	
	#[NoReturn]
	public static function redirect(string $path): void
	{
		header("Location: $path");
		exit();
	}
}
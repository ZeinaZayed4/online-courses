<?php

namespace App;

class Session
{
	public static function start(): void
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}
	
	public static function set(string $key, mixed $value): void
	{
		self::start();
		$_SESSION[$key] = $value;
	}
	
	public static function get(string $key, $default = null): mixed
	{
		self::start();
		
		if (str_contains($key, '.')) {
			return self::get_values($key, $default);
		}
		
		return $_SESSION[$key] ?? $default;
	}
	
	public static function has(string $key): bool
	{
		self::start();
		
		if (str_contains($key, '.')) {
			return self::get_values($key) !== null;
		}
		
		return isset($_SESSION[$key]);
	}
	
	public static function remove(string $key): void
	{
		self::start();
		
		if (str_contains($key, '.')) {
			$keys = explode('.', $key);
			$lastKey = array_pop($keys);
			$value = &$_SESSION;
			
			foreach ($keys as $k) {
				if (!isset($value[$k]) || !is_array($value[$k])) {
					return;
				}
				$value = &$value[$k];
			}
			
			unset($value[$lastKey]);
			return;
		}
		
		unset($_SESSION[$key]);
	}
	
	public static function destroy(): void
	{
		self::start();
		session_destroy();
	}
	
	private static function get_values(string $key, $default = null): mixed
	{
		$keys = explode('.', $key);
		$value = $_SESSION;
		
		foreach ($keys as $k) {
			if (!isset($value[$k])) {
				return $default;
			}
			$value = $value[$k];
		}
		
		return $value;
	}
}
<?php

namespace App;

class Validator
{
	public static function string(string $value, int $min = 6, int $max = 20): bool
	{
		$value = trim($value);
		
		return strlen($value) >= $min && strlen($value) <= $max;
	}
	
	public static function email(string $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}
	
	public static function required(string $value): bool
	{
		return !empty($value);
	}
}
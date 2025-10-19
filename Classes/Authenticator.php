<?php

namespace App;

class Authenticator
{
	public static function attempt($email, $password): bool
	{
		$database = new Database();
		$user = $database->query('SELECT * FROM `users` WHERE `email` = :email', [
			'email' => $email,
		])->find();
		
		if ($user) {
			if (password_verify($password, $user['password'])) {
				self::login($user);
				
				return true;
			}
		}
		
		return false;
	}
	
	public static function login($user): void
	{
		Session::set('login', true);
		Session::set('user', [
			'username' => $user['username'],
			'email' => $user['email'],
			'role' => $user['role']
		]);
		
		session_regenerate_id(true);
	}
	
	public static function logout(): void
	{
		Session::destroy();
	}
}
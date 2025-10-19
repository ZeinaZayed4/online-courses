<?php

require_once '../app.php';

use App\Authenticator;
use App\Request;
use App\Session;
use App\Validator;

$username = Request::post('username');
$email = Request::post('email');
$password = Request::post('password');
$repeat_password = Request::post('repeat_password');
$role = Request::post('role');

$errors = [];

if (!Validator::required($username) ||
	!Validator::required($email) ||
	!Validator::required($password) ||
	!Validator::required($repeat_password) ||
	!Validator::required($role)
) {
	$errors['required'] = 'All fields are required.';
}

if (!Validator::string($username)) {
	$errors['username'] = 'Username must be a string between 6 and 20 characters.';
}

if (!Validator::email($email)) {
	$errors['email'] = 'Invalid email address.';
}

if (!Validator::string($password, 7, 255)) {
	$errors['password'] = 'Password must be at least 7 characters.';
}

if ($repeat_password != $password) {
	$errors['repeat_password'] = "Password doesn't match.";
}

if (!empty($errors)) {
	Session::set('errors', $errors);
	Request::redirect('../signup.php');
}

$user = $database->query('SELECT * FROM `users` WHERE `email` = :email', [
	':email' => $email,
])->find();

if ($user) {
	Request::redirect('../login.php');
} else {
	$database->query('INSERT INTO `users` (`username`, `email`, `password`, `role`)
		VALUES (:username, :email, :password, :role)', [
		':username' => $username,
		':email' => $email,
		':password' => password_hash($password, PASSWORD_BCRYPT),
		':role' => $role,
	]);
	
	$user = $database->query('SELECT * FROM `users` WHERE `email` = :email', [
		':email' => $email,
	])->find();
	
	Authenticator::login($user);
	
	Request::redirect('../index.php');
}
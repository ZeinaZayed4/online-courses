<?php

require_once '../app.php';

use App\Authenticator;
use App\Request;
use App\Session;
use App\Validator;

$email = Request::post('email');
$password = Request::post('password');

$errors = [];

if (!Validator::required($email) || !Validator::required($password)) {
	$errors['required'] = 'All fields are required.';
}

if (!Validator::email($email)) {
	$errors['email'] = 'Invalid email address.';
}

if (!Validator::string($password, 7, 255)) {
	$errors['password'] = 'Password must be at least 7 characters.';
}

if (!empty($errors)) {
	Session::set('errors', $errors);
	Request::redirect('../login.php');
}

if (!Authenticator::attempt($email, $password)) {
	$errors['email'] = 'These credentials do not match.';
	Session::set('errors', $errors);
	Request::redirect('../login.php');
}

Request::redirect('../index.php');

<?php

use App\Authenticator;
use App\Request;
use App\Session;

require_once '../app.php';

if (Session::has('login')) {
	Authenticator::logout();
	Request::redirect('../index.php');
}

<?php
require_once __DIR__ . "/controller.form.php";
require_once __DIR__ . "/../Model/DbConnect.php";
require_once __DIR__ . "/../Model/User.php";


if (isset($_POST['do_login'])) {
	$errors = [];
	$email = trim(strip_tags($_POST['email']));
	$password = trim(strip_tags($_POST['password']));
	$user = new User($name, $surname, $email, $phone, $password);
	$dbc = DbConnect::getInstance();
	$result = $dbc->getQuery("SELECT * FROM `users` WHERE `email` = '{$user->getEmail()}' AND `password` = '{$user->getPassword()}'");
	$row = $result->fetch_object();

	if (empty($row->email)) {
		$errors[] = 'User with this Email was not found, or the password is incorrect';
	} else {
		$_SESSION['logged_user'] = $row;
		header('Location:/../index.php');
	}
}

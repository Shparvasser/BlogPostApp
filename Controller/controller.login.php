<?php
require_once __DIR__ . "/controller.form.php";
require_once __DIR__ . "/../Model/DbConnect.php";
require_once __DIR__ . "/../Model/User.php";


if (isset($_POST['do_login'])) {
	$errors = [];
	$email = trim(strip_tags($_POST['email']));
	$password = trim(strip_tags($_POST['password']));
	$dbc = DbConnect::getInstance();
	$result = $dbc->getQuery("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
	$row = $result->fetch_object();

	if (empty($row->email)) {
		$errors[] = 'Пользователь с таким Email не найден, или не правильный пароль';
	} else {
		$_SESSION['logged_user'] = $row;
		header('Location:/../index.php');
	}
}

<?php
session_start();
require_once __DIR__ . "/../Model/DbConnect.php";
require_once __DIR__ . "/../Model/User.php";

if (isset($_POST['do_register'])) {
	$name = trim(strip_tags($_POST['name']));
	$surname = trim(strip_tags($_POST['surname']));
	$email = trim(strip_tags($_POST['email']));
	$phone = trim(strip_tags($_POST['phone']));
	$password = trim(strip_tags($_POST['password']));
	$passwordTwo = trim(strip_tags($_POST['password_2']));
	$errors = [];
	if (empty($name) && empty($surname) && empty($email) && empty($phone) && empty($password)) {
		$errors['name'] = "Enter your name";
		$errors['surname'] = "Enter your surname";
		$errors['email'] = "Enter your email";
		$errors['phone'] = "Enter your phone";
		$errors['password'] = "Enter your password";
	}
	if (empty($passwordTwo) || $passwordTwo != $password) {
		$errors['password_2'] = "The repeated password was entered incorrectly";
	}
	if ((mb_strlen($name) < 3 || mb_strlen($name) > 35) && empty($errors['name'])) {
		$errors['name'] = 'Invalid name length';
	}

	if ((mb_strlen($surname) < 5 || mb_strlen($surname) > 35) && empty($errors['surname'])) {
		$errors['surname'] = 'Invalid surname length';
	}

	if (preg_match("/[^a-zA-Z]/i", $name) && empty($errors['name'])) {
		$errors['name'] = 'You have entered an invalid character! Only letters are allowed! ';
	}

	if (preg_match("/[^a-zA-Z]/i", $surname) && empty($errors['surname'])) {
		$errors['surname'] = 'You have entered an invalid character! Only letters are allowed! ';
	}
	if (preg_match("/[^a-zA-Z0-9]/i", $password) && empty($errors['password'])) {
		$errors['password'] = 'You have entered an invalid character! Only letters are allowed! ';
	}

	if (preg_match("/[^a-zA-Z0-9]/i", $passwordTwo) && empty($errors['password_2'])) {
		$errors['password_2'] = 'You have entered an invalid character! Only letters are allowed! ';
	}

	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email) && empty($errors['email'])) {
		$errors['email'] = 'Incorrectly entered e-mail';
	}
	if (empty($errors)) {
		$user = new User($name, $surname, $email, $phone, $password);
		$dbc = DbConnect::getInstance();
		$result = $dbc->getQuery("SELECT `email` FROM `users` WHERE `email` = '$email'");
		$row = $result->fetch_object();

		if (empty($row->email)) {
			$result = $dbc->getQuery("INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) VALUES ('{$user->getName()}','{$user->getSurname()}','{$user->getEmail()}','{$user->getPhone()}','{$user->getPassword()}')");
			if ($result) {
				$letter = "<p class='green'>Пользователь {$user->getEmail()} успешно зарегистрирован</p>";
			} else $letter = "<p class='error'>Пользователь не зарегистрирован, попробуйте ещё раз</p>";
			$result->close();
		}
		header('Location:../View/view.form.php');
	}
}

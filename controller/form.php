<?php
session_start();
// class FormValidator
// {
// 	protected $name, $surname, $email, $phone, $password;
// 	public function ();
// }
// include '/model/connect.php';

// $name = $_POST['name'];
// $surname = $_POST['surname'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $password = $_POST['password'];
// $passwordTwo = $_POST['password_2'];

// if (isset($_POST['do_register'])) {
// 	$errors = [];
// 	if (empty($name)) {
// 		$errors['name'] = "Enter your name";
// 	}
// 	if (empty($surname)) {
// 		$errors['surname'] = "Enter your surname";
// 	}
// 	if (empty($email)) {
// 		$errors['email'] = "Enter your email";
// 	}
// 	if (empty($phone)) {
// 		$errors['phone'] = "Enter your phone";
// 	}
// 	if (empty($password)) {
// 		$errors['password'] = "Enter your password";
// 	}
// 	if (empty($passwordTwo) || $passwordTwo != $password) {
// 		$errors['password_2'] = "The repeated password was entered incorrectly";
// 	}
// 	if ((mb_strlen($name) < 3 || mb_strlen($name) > 35) && empty($errors['name'])) {
// 		$errors['name'] = 'Invalid name length';
// 	}

// 	if ((mb_strlen($surname) < 5 || mb_strlen($surname) > 35) && empty($errors['surname'])) {
// 		$errors['surname'] = 'Invalid surname length';
// 	}

// 	if (preg_match("/[^a-zA-Z]/i", $name) && empty($errors['name'])) {
// 		$errors['name'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}

// 	if (preg_match("/[^a-zA-Z]/i", $surname) && empty($errors['surname'])) {
// 		$errors['surname'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}
// 	if (preg_match("/[^a-zA-Z0-9]/i", $password) && empty($errors['password'])) {
// 		$errors['password'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}

// 	if (preg_match("/[^a-zA-Z0-9]/i", $password2) && empty($errors['password2'])) {
// 		$errors['password_2'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}

// 	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email) && empty($errors['email'])) {
// 		$errors['email'] = 'Incorrectly entered e-mail';
// 	}
// 	if (empty($errors)) {
// 		$password = md5($password);
// 		$conn->query("INSERT INTO `users` (`name`, `surname`, `email`, `phone`,`password`) VALUES('$name', '$surname', '$email','$phone', '$password')");
// 		$mysqliResult = $conn->query("SELECT * FROM `users` WHERE `email` = '$email'");
// 		$user = $mysqliResult->fetch_assoc();
// 		$_SESSION['logged_user'] = $user;
// 		$conn->close();
// 		header('Location:index.php');
// 		return;
// 	}
// }

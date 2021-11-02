<?php

namespace App\Controller;

session_start();

use App\Model\DbConnect;
use App\Model\User;
use App\Validate\Validator;

class FormRegister
{
	private $name;
	private $surname;
	private $email;
	private	$phone;
	private $password;
	//private	$passwordConfirm;

	public function doRegister()
	{
		if (isset($_POST['do_register'])) {
			$this->name = trim(strip_tags($_POST['name']));
			$this->surname = trim(strip_tags($_POST['surname']));
			$this->email = trim(strip_tags($_POST['email']));
			$this->phone = trim(strip_tags($_POST['phone']));
			$this->password = trim(strip_tags($_POST['password']));
			$this->passwordConfirm = trim(strip_tags($_POST['passwordConfirm']));

			$data = ['name' => "$this->name", 'surname' => "$this->surname", 'email' => "$this->email", 'phone' => "$this->phone", 'password' => "$this->password"];

			$rules = [
				'name' => ['required', 'minLen' => 3, 'maxLen' => 20, 'alpha'],
				'surname' => ['required', 'minLen' => 5, 'maxLen' => 20, 'alpha'],
				'email' => ['required', 'minLen' => 6, 'maxLen' => 150],
				'phone' => ['required', 'minLen' => 5, 'maxLen' => 15, 'numeric'],
				'password' => ['required', 'minLen' => 8],
				'name' => ['required', 'minLen' => 6, 'maxLen' => 150, 'alpha'],
			];
			$validator = new Validator;
			$validator->validate($data, $rules);
			if ($validator->error()) {
				print_r($validator->error());
			} else {
				$user = new User($this->name, $this->surname, $this->email, $this->phone, $this->password);
				$dbc = DbConnect::getInstance();
				$result = $dbc->getQuery("SELECT `email` FROM `users` WHERE `email` = '$this->email'");
				$row = $result->fetch_object();

				if (empty($row->email)) {
					$result = $dbc->getQuery("INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) VALUES ('{$user->getName()}','{$user->getSurname()}','{$user->getEmail()}','{$user->getPhone()}','{$user->getPassword()}')");
					$mysqliResult = $dbc->getQuery("SELECT * FROM `users` WHERE `email` = '{$user->getEmail()}'");
					$user = $mysqliResult->fetch_object();
					$_SESSION['logged_user'] = $user;
				}
				header('Location:../index.php');
			}
		}
	}
}



// if (isset($_POST['do_register'])) {
// 	$name = trim(strip_tags($_POST['name']));
// 	$surname = trim(strip_tags($_POST['surname']));
// 	$email = trim(strip_tags($_POST['email']));
// 	$phone = trim(strip_tags($_POST['phone']));
// 	$password = trim(strip_tags($_POST['password']));
// 	$passwordTwo = trim(strip_tags($_POST['password_2']));
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
// 	if ((mb_strlen($name) < 3 || mb_strlen($name) > 20) && empty($errors['name'])) {
// 		$errors['name'] = 'Invalid name length 3-20';
// 	}
// 	if ((mb_strlen($surname) < 5 || mb_strlen($surname) > 20) && empty($errors['surname'])) {
// 		$errors['surname'] = 'Invalid surname length 5-20';
// 	}
// 	if ((mb_strlen($phone) < 5 || mb_strlen($phone) > 16) && empty($errors['phone'])) {
// 		$errors['phone'] = 'Invalid phone length 5-11';
// 	}
// 	if ((mb_strlen($password) < 6) && empty($errors['password'])) {
// 		$errors['password'] = 'Invalid password length < 6';
// 	}
// 	if (preg_match("/[^0-9]/i", $phone) && empty($errors['phone'])) {
// 		$errors['phone'] = 'You have entered an invalid character! Only numbers';
// 	}
// 	if (preg_match("/[^a-zA-Z]/i", $name) && empty($errors['name'])) {
// 		$errors['name'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}
// 	if (preg_match("/[^a-zA-Z]/i", $surname) && empty($errors['surname'])) {
// 		$errors['surname'] = 'You have entered an invalid character! Only letters are allowed!';
// 	}
// 	if (preg_match("/[^a-zA-Z0-9]/i", $password) && empty($errors['password'])) {
// 		$errors['password'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}

// 	if (preg_match("/[^a-zA-Z0-9]/i", $passwordTwo) && empty($errors['password_2'])) {
// 		$errors['password_2'] = 'You have entered an invalid character! Only letters are allowed! ';
// 	}

// 	if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email) && empty($errors['email'])) {
// 		$errors['email'] = 'Incorrectly entered e-mail';
// 	}
// 	if (empty($errors)) {
// 		$user = new User($name, $surname, $email, $phone, $password);
// 		$dbc = DbConnect::getInstance();
// 		$result = $dbc->getQuery("SELECT `email` FROM `users` WHERE `email` = '$email'");
// 		$row = $result->fetch_object();

// 		if (empty($row->email)) {
// 			$result = $dbc->getQuery("INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) VALUES ('{$user->getName()}','{$user->getSurname()}','{$user->getEmail()}','{$user->getPhone()}','{$user->getPassword()}')");
// 			$mysqliResult = $dbc->getQuery("SELECT * FROM `users` WHERE `email` = '{$user->getEmail()}'");
// 			$user = $mysqliResult->fetch_object();
// 			$_SESSION['logged_user'] = $user;
// 		}

// 		header('Location:../index.php');
// 	}
// 	$savedName = $_POST['name'];
// 	$savedSurname = $_POST['surname'];
// 	$savedEmail = $_POST['email'];
// 	$savedPhone = $_POST['phone'];
// }

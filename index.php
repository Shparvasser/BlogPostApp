<?php
include 'model/connect.php';
include 'model/user.php';
include 'view/view.user.php';
//include 'controller/form.php';

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Stage2</title>
</head>

<body>
	<header></header>
	<main>
		<section class="section__form">
			<div class="form__register">
				<form method="post" action="controller/form.php">
					<div>
						<label for="name">Name:</label>
						<input type="text" name="name" id="name">
						<div style="color: red;"><?php echo $errors['name']; ?></div>
					</div>
					<div>
						<label for="surname">Surname:</label>
						<input type="text" name="surname" id="surname">
						<div style="color: red;"><?php echo $errors['surname']; ?></div>
					</div>
					<div>
						<label for="email">E-mail:</label>
						<input type="email" name="email" id="email">
						<div style="color: red;"><?php echo $errors['email']; ?></div>
					</div>
					<div>
						<label for="phone">Phone:</label>
						<input type="tel" name="phone" id="phone">
						<div style="color: red;"><?php echo $errors['phone']; ?></div>
					</div>
					<div>
						<label for="password">Password:</label>
						<input type="password" name="password" id="password">
						<div style="color: red;"><?php echo $errors['password']; ?></div>
					</div>
					<div>
						<label for="password_2">Confirm Password:</label>
						<input type="password" name="password_2" id="password_2">
						<div style="color: red;"><?php echo $errors['password_2']; ?></div>
					</div>
					<button type="submit" name="do_register">Register</button>
				</form>
			</div>
		</section>
	</main>
	<footer></footer>
</body>

</html>
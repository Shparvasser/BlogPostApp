<?php
require_once __DIR__ . "/Controller/controller.form.php";
require_once __DIR__ . "/Model/DbConnect.php";
require_once __DIR__ . "/Model/User.php";
require_once __DIR__ . "/header.php";
?>
<main>
	<div>
		<center>
			<h1>Добро пожаловать на наш сайт!</h1>
		</center>
	</div>
</main>
<?php
if (isset($_SESSION['logged_user'])) : ?>
	<?php

	$row = $_SESSION['logged_user'];
	echo "Привет, ";
	echo "$row->name,";
	echo " $row->email" . "<br>";
	?>
	<a href="logout.php">Выйти</a>
<?php else : ?>
	<a href="login.php">Авторизоваться</a><br>
	<a href="signup.php">Регистрация</a>
<?php endif; ?>

<?php require_once __DIR__ . "/footer.php"; ?>
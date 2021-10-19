<?php
require_once __DIR__ . "/Controller/controller.form.php";
require_once __DIR__ . "/Model/DbConnect.php";
require_once __DIR__ . "/Model/User.php";
require_once __DIR__ . "/header.php";
?>
<main>
	<div>
		<center>
			<h1>Welcome to our website!</h1>
		</center>
	</div>
</main>
<?php
if (isset($_SESSION['logged_user'])) : ?>
	<?php

	$row = $_SESSION['logged_user'];
	echo "Hello, ";
	echo "$row->name,";
	echo " $row->email" . "<br>";
	?>
	<a href="logout.php">Logout</a>
<?php else : ?>
	<a href="login.php">Login</a><br>
	<a href="signup.php">Registration</a>
<?php endif; ?>

<?php require_once __DIR__ . "/footer.php"; ?>
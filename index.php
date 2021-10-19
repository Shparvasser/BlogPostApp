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
	<div class="body">
		<div class="body__message message">
			<h5 class="message__title">Lorem, ipsum dolor.</h5>
			<p class="message__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quae id harum quo vel tempore at, pariatur tempora autem vero vitae totam voluptas sapiente magnam porro saepe hic eligendi iure.</p>
			<a class="message__link" href="#">Read More</a>
		</div>
		<div class="body__message message">
			<h5 class="message__title">Lorem, ipsum dolor.</h5>
			<p class="message__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quae id harum quo vel tempore at, pariatur tempora autem vero vitae totam voluptas sapiente magnam porro saepe hic eligendi iure.</p>
			<a class="message__link" href="#">Read More</a>
		</div>
		<div class="body__message message">
			<h5 class="message__title">Lorem, ipsum dolor.</h5>
			<p class="message__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quae id harum quo vel tempore at, pariatur tempora autem vero vitae totam voluptas sapiente magnam porro saepe hic eligendi iure.</p>
			<a class="message__link" href="#">Read More</a>
		</div>
		<div class="body__message message">
			<h5 class="message__title">Lorem, ipsum dolor.</h5>
			<p class="message__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quae id harum quo vel tempore at, pariatur tempora autem vero vitae totam voluptas sapiente magnam porro saepe hic eligendi iure.</p>
			<a class="message__link" href="#">Read More</a>
		</div>
	</div>

</main>

<?php require_once __DIR__ . "/footer.php"; ?>
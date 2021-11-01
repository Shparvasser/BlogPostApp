<?php
require_once __DIR__ . "/app/Controller/controller.form.php";
require_once __DIR__ . "/app/Model/DbConnect.php";
require_once __DIR__ . "/app/Model/User.php";
require_once __DIR__ . "/app/View/view.header.php";
?>
<main>
	<div>
		<center>
			<h1>Welcome to our website!</h1>
			<div>123</div>
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
		<a href="/app/View/view.create.php">Create Posts</a><br>
		<a href="/app/View/view.logout.php">Logout</a>
	<?php else : ?>
		<a href="/app/View/view.login.php">Login</a><br>
		<a href="/app/View/view.signup.php">Registration</a>

	<?php endif; ?>

	<?php

	$dbc = DbConnect::getInstance();
	$row = $dbc->getQuery("SELECT * FROM `posts`");
	foreach ($row as $value) { ?>
		<div class="body">
			<div class="body__message message">
				<h5 class="message__title"><?php echo $value['title'] ?></h5>
				<p class="message__text"><?php
													if (mb_strlen($value['content']) < 150) {

														echo $value['content'];
													} else {
														$str = substr($value['content'], 0, 150);
														echo $str . "...";
													} ?> </p>
				<a class="message__link" href="/app/View/view.posts.php?id=<?php echo $value['id']; ?>">Read More</a>
			</div>
		</div>
	<?php } ?>
</main>

<?php require_once __DIR__ . "/app/View/view.footer.php"; ?>
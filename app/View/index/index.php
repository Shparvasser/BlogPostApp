<main>
	<div>
		<center>
			<h1>Welcome to our website!</h1>
		</center>
	</div>
	<?php

	use App\Model\DbConnect;

	if (isset($_SESSION['logged_user'])) : ?>
		<?php

		$row = $_SESSION['logged_user'];
		echo "Hello, ";
		echo "$row->name,";
		echo " $row->email" . "<br>";
		?>
		<a href="/View/view.create.php">Create Posts</a><br>
		<a href="/View/view.logout.php">Logout</a>
	<?php else : ?>
		<a href="/View/view.login.php">Login</a><br>
		<a href="/View/view.signup.php">Registration</a>

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
				<a class="message__link" href="app/View/PostsView.php?id=<?php echo $value['id']; ?>">Read More</a>
			</div>
		</div>
	<?php } ?>
</main>
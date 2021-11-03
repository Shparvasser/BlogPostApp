<?php
require_once __DIR__ . "/HeaderView.php";
?>
<div>
	<div>
		<div>
			<h2>Authorization form </h2>
			<form method="post">
				<label for="email">E-mail:</label>
				<input type="email" name="email" id="email" placeholder="Enter email">
				<div style="color: red;"><?php echo array_shift($errors); ?></div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="Enter password">
				<button name="do_login" id="do_login" type="submit">Login</button>
			</form>
			<br>
			<p>If you are not registered yet, then click <a href="view.signup.php">here</a>.</p>
			<p>Go back to the <a href="../../index.php">main page</a>.</p>
		</div>
	</div>
</div>
<?php require_once __DIR__ . "/FooterView.php"; ?>
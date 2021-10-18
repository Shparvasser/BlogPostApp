<?php
require_once __DIR__ . "/Model/DbConnect.php";
require_once __DIR__ . "/Model/User.php";
require_once __DIR__ . "/header.php";

?>
<main>
	<section class="section__form">
		<div class="form__register">
			<form method="post" action="/controller/form.php">
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
<?php require_once __DIR__ . "/footer.php"; ?>
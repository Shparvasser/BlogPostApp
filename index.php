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
				<form method="post" action="form.php">
					<div>
						<label for="name">Name:</label>
						<input type="text" name="name" id="name">
					</div>
					<div>
						<label for="surname">Surname:</label>
						<input type="text" name="email" id="surname">
					</div>
					<div>
						<label for="email">E-mail:</label>
						<input type="email" name="email" id="email">
					</div>
					<div>
						<label for="phone">Phone:</label>
						<input type="tel" name="phone" id="phone">
					</div>
					<div>
						<label for="password">Password:</label>
						<input type="password" name="password" id="password">
					</div>
					<div>
						<label for="password_2">Confirm Password:</label>
						<input type="password" name="password_2" id="password_2">
					</div>
					<button type="submit" name="do_register">Register</button>
				</form>
			</div>
		</section>
	</main>
	<footer></footer>
</body>

</html>
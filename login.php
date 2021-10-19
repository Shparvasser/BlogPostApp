<?php
require_once __DIR__ . "/Controller/controller.login.php";
require_once __DIR__ . "/header.php";
?>
<div>
	<div>
		<div>
			<h2>Форма авторизации</h2>
			<form method="post">
				<label for="email">E-mail:</label>
				<input type="email" name="email" id="email" placeholder="Введите Email">
				<div style="color: red;"><?php echo array_shift($errors); ?></div>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" placeholder="Введите пароль">
				<button name="do_login" id="do_login" type="submit">Авторизоваться</button>
			</form>
			<br>
			<p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
			<p>Вернуться на <a href="index.php">главную</a>.</p>
		</div>
	</div>
</div>
<?php require_once __DIR__ . "/footer.php"; ?>
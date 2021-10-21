<?php
require_once __DIR__ . "/Controller/controller.login.php";
require_once __DIR__ . "/Controller/controller.find.php";
require_once __DIR__ . "/header.php";

?>
<div>
	<form method="post">
		<label for="search">Search</label>
		<input type="text" name="search" id="search" placeholder="Search...">
		<button name="do_search" id="do_search" type="submit">Search</button>
	</form>
</div>

<main>
	<?php
	if (isset($_POST['do_search'])) {
		$search = $_POST['search'];
		$dbc = DbConnect::getInstance();
		$rows = $dbc->getQuery("SELECT * FROM `blog` WHERE `tag` = '$search'");
		if (($rows->num_rows) == NULL) {
			$errors = 'Dont have posts this name'; ?>
			<div stayle="color: red;"><?= $errors ?></div>
			<?php	} else {
			foreach ($rows as $row) {
				$aftor = $row['aftor_id'];
				$users = $dbc->getQuery("SELECT * FROM `users` WHERE users_id = $aftor");
				foreach ($rows as $row) {	?>
					<div class="body">
						<div class="body__message message">
							<h2 class="message__title"><?php echo $row['title'] ?></h2>
							<p class="message__text"><?php echo $row['content'] ?></p>
							<?php foreach ($users as $user) { ?>
								<div> <?php echo $user['name']; ?></div>
								<div> <?php echo $user['surname']; ?></div>
							<?php } ?>
							<div><?php echo $row['date'] ?></div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</main>

<?php require_once __DIR__ . "/footer.php"; ?>
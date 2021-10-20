<?php
require_once __DIR__ . "/Controller/controller.form.php";
require_once __DIR__ . "/Model/DbConnect.php";
require_once __DIR__ . "/Model/User.php";
require_once __DIR__ . "/header.php";


?>
<main>
	<?php
	$id = $_GET['id'];
	$dbc = DbConnect::getInstance();
	$rows = $dbc->getQuery("SELECT * FROM `blog` WHERE id = $id");
	foreach ($rows as $row) {
		$aftor = $row['aftor_id'];
	}
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
</main>

<?php require_once __DIR__ . "/footer.php"; ?>
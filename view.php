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
	$row = $dbc->getQuery("SELECT * FROM `blog` WHERE id = $id");
	foreach ($row as $value) { ?>
		<div class="body">
			<div class="body__message message">
				<h2 class="message__title"><?php echo $value['title'] ?></h2>
				<p class="message__text"><?php echo $value['content'] ?></p>
				<p><?php echo $value['aftor_id'] ?></p>
				<div><?php echo $value['date'] ?></div>
			</div>
		</div>
	<?php } ?>
</main>

<?php require_once __DIR__ . "/footer.php"; ?>
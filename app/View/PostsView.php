<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
error_reporting(-1);

use App\Model\DbConnect;

//require_once __DIR__ . "/../Model/DbConnect.php";
require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/HeaderView.php";

?>
<main>
	<?php
	$id = $_GET['id'];
	$dbc = DbConnect::getInstance();
	$rows = $dbc->getQuery("SELECT * FROM `posts` WHERE id = $id");
	foreach ($rows as $row) {
		$autor = $row['autor_id'];
	}
	$users = $dbc->getQuery("SELECT * FROM `users` WHERE users_id = $autor");
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

<?php require_once __DIR__ . "/FooterView.php"; ?>
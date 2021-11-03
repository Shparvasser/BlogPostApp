<?php

use App\Model\DbConnect;

require_once __DIR__ . "/../Model/DbConnect.php";
require_once __DIR__ . "/../Controller/PostController.php";
require_once __DIR__ . "/HeaderView.php";

?>
<div>
	<form method="post">
		<label for="search">Search</label>
		<select name="tag" id="tag">
			<?php
			$dbc = DbConnect::getInstance();
			$result = $dbc->getQuery("SELECT * FROM `tags`");
			$tags = $result->fetch_all();
			foreach ($tags as $tag) {
				echo "<option value= '$tag[0]'> $tag[1]</option>";
			}
			?>
		</select>
		<button name="do_search" id="do_search" type="submit">Search</button>
	</form>
</div>

<main>
	<?php
	if (isset($_POST['do_search'])) {
		$search = $_POST['tag'];
		$dbc = DbConnect::getInstance();
		$rows = $dbc->getQuery("SELECT * FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id WHERE tag_id = '$search'");
		$All = $rows->fetch_all();
		if (($All) == NULL) {
			$errors = 'Dont have posts this name'; ?>
			<div style="color: red;"><?= $errors ?></div>
			<?php	} else {
			foreach ($All as $row) {
				$autor = $row[8];
				$users = $dbc->getQuery("SELECT * FROM `users` WHERE users_id = $autor");
			?>
				<div class="body">
					<div class="body__message message">
						<h2 class="message__title"><?php echo $row[5] ?></h2>
						<p class="message__text"><?php echo $row[7] ?></p>
						<?php foreach ($users as $user) { ?>
							<div> <?php echo $user['name']; ?></div>
							<div> <?php echo $user['surname']; ?></div>
						<?php } ?>
						<div><?php echo $row[6] ?></div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	<div>
		<table>
			<tr>
				<th>TAG</th>
			</tr>
			<?php
			$dbc = DbConnect::getInstance();
			$rows = $dbc->getQuery("SELECT tag, COUNT(tag) AS tag_count FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id GROUP BY tag HAVING tag_count >=1 ORDER BY tag_count DESC, tag");
			$All = $rows->fetch_all();
			foreach ($All as $tag) {

			?>
				<tr>
					<td><?php echo $tag[0]; ?></td>
				</tr>
			<?php } ?>

		</table>
	</div>
</main>

<?php require_once __DIR__ . "/FooterView.php"; ?>
<?php

use App\Model\DbConnect;

?>
<div>
	<form method="post">
		<label for="search">Search</label>
		<select name="tag" id="tag">
			<?php
			$dbc = DbConnect::getInstance();
			$results = $dbc->findArrays("SELECT * FROM `tags`");
			foreach ($results as $result) {
				echo "<option value= '{$result['id']}'> {$result['tag']}</option>";
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
		$rows = $dbc->findArrays("SELECT * FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id WHERE tag_id = '$search'");
		if (($rows) == NULL) {
			$errors = 'Dont have posts this name'; ?>
			<div style="color: red;"><?= $errors ?></div>
			<?php	} else {

			foreach ($rows as $row) {
				$autor = $row['autor_id'];
				$users = $dbc->findArrays("SELECT * FROM `users` WHERE users_id = $autor");
			?>
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
	<div>
		<table>
			<tr>
				<th>TAG</th>
			</tr>
			<?php
			$dbc = DbConnect::getInstance();
			$rows = $dbc->findArrays("SELECT tag, COUNT(tag) AS tag_count FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id GROUP BY tag HAVING tag_count >=1 ORDER BY tag_count DESC, tag");

			foreach ($rows as $row) {
			?>
				<tr>
					<td><?php echo $row['tag']; ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</main>
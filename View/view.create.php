<?php
require_once __DIR__ . "/../Controller/controller.create.php";
require_once __DIR__ .  "/view.header.php";
require_once __DIR__ . "/../Model/Tag.php";
?>

<section class="section__form">
	<div class="form__register">
		<form method="post">
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="<?php echo (isset($savedTitle)) ? $savedTitle : ''; ?>">
			<div style=color:red;><?php echo $errors['title']; ?></div>
			<label for="tag">Tag</label>
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
			<label for="contetn">Message</label>
			<textarea name="content" id="content"><?php echo (isset($savedMessage)) ? $savedMessage : ''; ?></textarea>
			<div style=color:red;><?php echo $errors['content']; ?></div>
			<button type="submit" name="do_posts">Add Post</button>
		</form>
	</div>
</section>

<?php
require_once __DIR__ . "/view.footer.php"
?>
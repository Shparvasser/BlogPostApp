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
			<!-- <input type="text" name="tag" id="tag" value="<?php //echo (isset($savedTag)) ? $savedTag : ''; 
																				?>">-->
			<select name="tag" id="tag">
				<?php
				$dbc = DbConnect::getInstance();
				$result = $dbc->getQuery("SELECT tag FROM `tags`");
				$tags = $result->fetch_all();
				foreach ($tags as $tag) {
					echo "<option value= '$tag[0]'> $tag[0]</option>";
				}
				?>
			</select>
			<div style=color:red;><?php echo $errors['tag']; ?></div>
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
<?php
require_once __DIR__ . "../Controller/controller.create.php";
require_once __DIR__ .  "/view.header.php";
?>

<section class="section__form">
	<div class="form__register">
		<form method="post">
			<label for="title">Title</label>
			<input type="text" name="title" id="title">
			<label for="tag">Tag</label>
			<input type="text" name="tag" id="tag">
			<label for="contetn">Message</label>
			<textarea name="content" id="content"></textarea>
			<button type="submit" name="do_posts">Add Post</button>
		</form>
	</div>
</section>

<?php
require_once __DIR__ . "/view.footer.php"
?>
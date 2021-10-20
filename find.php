<?php
require_once __DIR__ . "/Controller/controller.login.php";
require_once __DIR__ . "/header.php";


if (isset($_POST['tag'])) {
}
?>
<div>
	<form method="post">
		<label for="search">Search</label>

		<input type="text" name="search" id="search" placeholder="Enter password">
		<button name="do_search" id="do_search" type="submit">Search</button>
	</form>
</div>
<?php require_once __DIR__ . "/footer.php"; ?>
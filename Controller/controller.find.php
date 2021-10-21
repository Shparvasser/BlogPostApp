<?php
require_once __DIR__ . "/controller.form.php";

if (isset($_POST['do_search'])) {
	$search = $_POST['search'];
	$dbc = DbConnect::getInstance();
	$rows = $dbc->getQuery("SELECT * FROM `blog` WHERE `tag` = '$search'");
}

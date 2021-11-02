<?php

use App\Model\DbConnect;

require_once __DIR__ . "/controller.form.php";

if (isset($_POST['do_search'])) {
	$search = $_POST['tag'];
	$dbc = DbConnect::getInstance();
	$rows = $dbc->getQuery("SELECT * FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id WHERE tag_id = '$search'");
}

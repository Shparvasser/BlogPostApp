<?php
require_once __DIR__ . "/controller.form.php";
require_once __DIR__ . "/../Model/Blog.php";
require_once __DIR__ . "/../Model/DbConnect.php";

$dbc = DbConnect::getInstance();

if (isset($_POST['do_posts'])) {
	$title = $_POST['title'];
	$tag = $_POST['tag'];
	$content = $_POST['content'];
	$date = date("Y/n/j");
	$dbc = DbConnect::getInstance();
	if (isset($_SESSION['logged_user'])) {
		$row = $_SESSION['logged_user'];
		var_dump($row);
		$aftor = $row->users_id;
		$blog = new Blog($title, $date, $content, $aftor, $tag);
		$result = $dbc->getQuery("INSERT INTO `blog` (`title`,`date`,`content`,`aftor_id`,`tag`) VALUES ('{$blog->getTitle()}','{$blog->getDate()}','{$blog->getContent()}','{$blog->getAftor()}','{$blog->getTag()}')");
		header('Location:/../index.php');
	}
}

<?php
require_once __DIR__ . "/controller.form.php";
require_once __DIR__ . "/../Model/Post.php";
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
		$autor = $row->users_id;
		$post = new Post($title, $date, $content, $autor, $tag);
		$result = $dbc->getQuery("INSERT INTO `posts` (`title`,`date`,`content`,`autor_id`,`tag`) VALUES ('{$post->getTitle()}','{$post->getDate()}','{$post->getContent()}','{$post->getAutor()}','{$post->getTag()}')");
		header('Location:/../index.php');
	}
}

<?php

// use App\Model\DbConnect;
// use App\Model\Post;

// require_once __DIR__ . "/controller.form.php";

// $dbc = DbConnect::getInstance();

// if (isset($_POST['do_posts'])) {
// 	$errors = [];
// 	$title = trim(strip_tags($_POST['title']));
// 	$tag_id = $dbc->getQuery("SELECT tag FROM `tags`");
// 	$tag_id = $_POST['tag'];
// 	$content = trim(strip_tags($_POST['content']));
// 	$date = date("Y/n/j");
// 	if (empty($title)) {
// 		$errors['title'] = 'These fields must not be empty ';
// 	}
// 	if (empty($content)) {
// 		$errors['content'] = 'These fields must not be empty ';
// 	}
// 	$dbc = DbConnect::getInstance();
// 	if (empty($errors)) {
// 		if (isset($_SESSION['logged_user'])) {
// 			$row = $_SESSION['logged_user'];
// 			$autor = $row->users_id;
// 			$post = new Post($title, $date, $content, $autor);
// 			$result = $dbc->getQuery("INSERT INTO `posts` (`title`,`date`,`content`,`autor_id`) VALUES ('{$post->getTitle()}','{$post->getDate()}','{$post->getContent()}','{$post->getAutor()}')");
// 			$resultLastId = $dbc->lastInsertId();
// 			if ($result) {
// 				$resultPostsTags = $dbc->getQuery("INSERT INTO `postsTags` (`posts_id`,`tag_id`) VALUES ((SELECT id FROM `posts` WHERE id = $resultLastId),'$tag_id')");
// 				header('Location:/../index.php');
// 			}
// 		}
// 	}
// 	$savedTitle = $_POST['title'];
// 	$savedMessage = $_POST['content'];
// }

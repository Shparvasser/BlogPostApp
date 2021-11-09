<?php

namespace App\Controller;

use App\Model\DbConnect;
use App\Model\Post;

class PostsController extends BaseController
{
	public $layouts = "first_layouts";

	public function createAction()
	{
		$this->template->view("CreateView");
		if (isset($_POST['do_posts'])) {
			$dbc = DbConnect::getInstance();
			$errors = [];
			$title = trim(strip_tags($_POST['title']));
			$tag_id = $dbc->findArrays("SELECT tag FROM `tags`");
			$tag_id = $_POST['tag'];
			$content = trim(strip_tags($_POST['content']));
			$date = date("Y/n/j");
			if (empty($title)) {
				$errors['title'] = 'These fields must not be empty ';
			}
			if (empty($content)) {
				$errors['content'] = 'These fields must not be empty ';
			}
			if (empty($errors)) {
				if (isset($_SESSION['logged_user'])) {
					$row = $_SESSION['logged_user'];
					$autor = $row['users_id'];
					$post = new Post($title, $date, $content, $autor);
					$result = $dbc->findArrays("INSERT INTO `posts` (`title`,`date`,`content`,`autor_id`) VALUES ('{$post->getTitle()}','{$post->getDate()}','{$post->getContent()}','{$post->getAutor()}')");
					print_r($result);
					$resultLastId = $dbc->lastInsertId();
					if ($result) {
						$resultPostsTags = $dbc->findArrays("INSERT INTO `postsTags` (`posts_id`,`tag_id`) VALUES ((SELECT id FROM `posts` WHERE id = $resultLastId),'$tag_id')");
						header('Location:../index.php');
					}
				}
			}
			$savedTitle = $_POST['title'];
			$savedMessage = $_POST['content'];
		}
	}
	public function findAction()
	{
		$this->template->view("FindView");
		if (isset($_POST['do_search'])) {
			$search = $_POST['tag'];
			$dbc = DbConnect::getInstance();
			$rows = $dbc->findArrays("SELECT * FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id WHERE tag_id = '$search'");
		}
	}
	public function indexAction()
	{
		$this->template->view('index');
	}
}

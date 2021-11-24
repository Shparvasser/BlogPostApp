<?php

namespace App\Controller;

use App\Model\Tag;
use App\Model\Post;
use App\Model\PostTag;
use App\Model\DbConnect;

class PostsController extends BaseController
{
    public $layouts = "first_layouts";

    public function createAction()
    {
        $tags = Tag::findAll();
        $this->template->vars('tags', $tags);
        $this->template->view("CreateView");
        $dbc = DbConnect::getInstance();
        $errors = [];
        $title = trim(strip_tags($_POST['title']));
        $tags = (int)strip_tags($_POST['tag']);
        $content = trim(strip_tags($_POST['content']));
        $date = date("Y-m-d");
        if (empty($title)) {
            $errors['title'] = 'These fields must not be empty ';
        }
        if (empty($content)) {
            $errors['content'] = 'These fields must not be empty ';
        }
        if (empty($errors)) {
            if (isset($_SESSION['logged_user'])) {
                $row = $_SESSION['logged_user'];
                $author = (int)$row['users_id'];
                $post = new Post($title, $date, $content, $author);
                $result = $post->insert();
                $resultLastId = $dbc->lastInsertId();
                if (!empty($result)) {
                    $postTag = new PostTag;
                    $postTag->insert($resultLastId, $tags);
                    header('Location:../index.php');
                }
            }
        }
    }


    public function findAction()
    {
        $search = (int)strip_tags($_POST['tag']);
        $tags = Tag::findAll();
        $postTag = new PostTag;
        $rows = $postTag->findTag($search);
        $postsTags = $postTag->countElements();
        $this->template->vars('tags', $tags);
        $this->template->vars('rows', $rows);
        $this->template->vars('postsTags', $postsTags);
        $this->template->view("FindView");
    }
    public function postViewAction()
    {
        $id = $_GET['id'];
        $value = 'id';
        $rows = Post::getById($id, $value);
        $this->template->vars('rows', $rows);
        $this->template->view("PostsView");
    }
    public function indexAction()
    {
        $this->template->view('index');
    }
}

<?php

namespace App\Controller;

use App\Model\DbConnect;
use App\Model\Post;
use App\Model\PostTag;
use App\Model\Tag;

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
                $result = Post::insert($title, $date, $content, $author);
                $resultLastId = $dbc->lastInsertId();
                if (!empty($result)) {
                    PostTag::insert($resultLastId, $tags);
                    header('Location:../index.php');
                }
            }
        }
    }


    public function findAction()
    {
        $search = (int)strip_tags($_POST['tag']);
        $tags = Tag::findAll();
        $rows = PostTag::findTag($search);
        $postsTags = PostTag::countElements();
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

<?php

namespace App\Controller;

use App\Model\Post;

class IndexController extends BaseController
{
    public $layouts = "first_layouts";

    function indexAction()
    {
        $rows = Post::findAll();
        $this->template->vars('rows', $rows);
        $this->template->view('index');
    }
}

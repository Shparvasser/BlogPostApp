<?php

namespace App\Controller;

use App\Logs\Log;
use App\Model\Post;

class IndexController extends BaseController
{
    public $layouts = "first_layouts";

    function indexAction()
    {
        $log = Log::setPathByMethod(__METHOD__);
        $log->log('Log method indexAction');
        $rows = Post::findAll();
        $this->template->vars('rows', $rows);
        $this->template->view('index');
    }
}

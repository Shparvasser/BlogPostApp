<?php

namespace App\Controller;

class IndexController extends BaseController
{

	public $layouts = "first_layouts";

	function indexAction()
	{
		$this->template->view('index');
	}
}

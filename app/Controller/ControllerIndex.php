<?php

namespace App\Controller;

class ControllerIndex extends ControllerBase
{

	public $layouts = "first_layouts";

	function index()
	{
		$this->template->view('index');
	}
}

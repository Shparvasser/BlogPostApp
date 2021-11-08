<?php

namespace App\Controller;

use App\Core\Template;

abstract class BaseController
{
	protected $registry;
	protected $template;
	protected $layouts;

	public $vars = [];

	/**
	 * __construct
	 *
	 * @param  mixed $registry
	 * @return mixed
	 */
	function __construct($registry)
	{
		$this->registry = $registry;
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function indexAction();
}

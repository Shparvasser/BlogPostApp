<?php

namespace App\Core;

use Exception;

class Router
{
	private $registry;
	private $path;
	private $args = [];

	function __construct($registry)
	{
		$this->registry = $registry;
	}

	public function setPath($path)
	{
		// $path = $path;
		// $path .= DS;
		if (is_dir($path) == false) {
			throw new Exception('Invalid controller path: `' . $path . '`');
		}
		$this->path = $path;
	}
	private function getController(&$file, &$controller, &$action, &$args)
	{
		$route = (empty($_GET['route'])) ? '' : $_GET['route'];
		unset($_GET['route']);
		if (empty($route)) {
			$route = 'Index';
		}

		$route = trim($route, '/\\');
		$parts = explode('/', $route);

		$cmd_path = $this->path;
		foreach ($parts as $part) {
			$fullpath = $cmd_path . $part;
			if (is_dir($fullpath)) {
				$cmd_path .= $part . DS;
				array_shift($parts);
				continue;
			}
			$controllerPath = $cmd_path . '/Controller' . $part . '.php';
			if (is_file($controllerPath)) {
				$controller = 'Controller' . $part;
				array_shift($parts);
				break;
			}
		}
		if (empty($controller)) {
			$controller = 'Index';
		}
		$action = array_shift($parts);
		if (empty($action)) {
			$action = 'Index';
		}
		$file = $cmd_path . '/' . $controller . '.php';
		$args = $parts;
	}
	function start()
	{
		$this->getController($file, $controller, $action, $args);

		if (is_readable($file) == false) {
			die('404 Not Found');
		}
		require_once($file);


		$class = "\App\Controller\\$controller";
		$controllerClass = new $class($this->registry);

		if (is_callable(array($controllerClass, $action)) == false) {
			die('404 Not Found');
		}

		$controllerClass->$action();
	}
}

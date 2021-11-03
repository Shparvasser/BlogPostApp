<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
error_reporting(-1);
session_start();

// require_once __DIR__ . "/vendor/autoload.php";

include_once('/configs/config.php');

include_once(SITE_PATH . DS . 'core' . DS . 'core.php');

$router = new Router($registry);

$registry->set('router', $router);
try {
	$router->setPath(SITE_PATH . 'controllers');
} catch (Exception $e) {
}

$router->start();

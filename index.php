<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
ini_set('display_startup_errors', 1);
error_reporting(-1);

use App\Controller\ControllerIndex;
use App\Core\Router;
use App\Core\Registry;

require_once __DIR__ . "/vendor/autoload.php";

include_once('./configs/config.php');

$registry = new Registry;
$router = new Router($registry);

$registry->set('router', $router);

try {
	$router->setPath(SITE_PATH . '/app/Controller');
} catch (Exception $e) {
}
$router->start();

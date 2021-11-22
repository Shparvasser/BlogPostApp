<?php
session_start();

use App\Core\Router;
use App\Core\Registry;
use App\Logs\Log;

require_once __DIR__ . "/vendor/autoload.php";

include_once('./configs/config.php');

\App\Logs\Log::setRootLogDir('logs');

$log = new Log('\test\logs\sad.log');
$log->log('Test 1');

$registry = new Registry;
$router = new Router($registry);

$registry->set('router', $router);

try {
	$router->setPath(SITE_PATH . '/app/Controller');
} catch (Exception $e) {
}
$router->start();

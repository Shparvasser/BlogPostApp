<?php
session_start();

use App\Core\Router;
use App\Core\Registry;
use App\Logs\Log;

require_once __DIR__ . "/vendor/autoload.php";

$configs = require_once('./configs/config_local.php');
define('CONFIGS', $configs);

\App\Logs\Log::setRootLogDir('logs');

$registry = new Registry;
$router = new Router($registry);

$registry->set('router', $router);

try {
    $router->setPath(SITE_PATH . '/app/Controller');
} catch (Exception $e) {
    throw new Exception("Dont set path");
    $log = new Log();
    $log->log('Log exception,dont set path');
}

$registry->get('router')->start();

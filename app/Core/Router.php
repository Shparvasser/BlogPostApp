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

    /**
     * setPath
     *
     * @param  mixed $path
     * @return string
     */
    public function setPath($path)
    {
        if (is_dir($path) == false) {
            throw new Exception('Invalid controller path: `' . $path . '`');
        }
        $this->path = $path;
    }
    /**
     * getController
     *
     * @param  mixed $file
     * @param  mixed $controller
     * @param  mixed $action
     * @param  mixed $args
     * @return mixed
     */
    private function getController(&$file, &$controller, &$action, &$args)
    {
        $route = empty($_SERVER['REDIRECT_URL']) ? '' : $_SERVER['REDIRECT_URL'];
        unset($_SERVER['REDIRECT_URL']);
        if (empty($route)) {
            $route = 'Index';
        }

        $route = trim('/\\' . $route, '/\\');
        $parts = explode('/', $route);
        $cmd_path = $this->path;
        foreach ($parts as $part) {
            $fullpath = $cmd_path . $part;
            if (is_dir($fullpath)) {
                $cmd_path .= $part . DS;
                array_shift($parts);
                continue;
            }
            $controllerPath = $cmd_path . '/' . ucfirst($part) . 'Controller.php';
            if (is_file($controllerPath)) {
                $controller = ucfirst($part) . 'Controller';
                array_shift($parts);
                break;
            }
        }
        if (empty($controller)) {
            $controller = 'Index';
        }
        $action = array_shift($parts);
        if (empty($action)) {
            $action = 'Index' . 'Action';
        } else {
            $action .= 'Action';
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

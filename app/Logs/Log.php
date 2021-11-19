<?php

namespace App\Logs;

use Exception;

class Log
{
    private static $rootPathDir;
    private $pathLog;

    public function __construct(string $path_value)
    {
        if (empty(self::$rootPathDir)) {
            throw new \Exception('Must set root log dir');
        }
        $path = $this->getValidPath($path_value);
        $this->pathLog = self::$rootPathDir . '/' . $path;
        if (!file_exists($this->pathLog)) {
            $arrayPath = explode('/', $path);
            $currentPathString = self::$rootPathDir . '/';
            foreach ($arrayPath as $key => $value) {
                $currentPathString .= $value . '/';
            }
        }
    }
    public function getValidPath(string $path_value)
    {
        $path = trim(str_replace('\\', '/', $path_value));
        return $path;
    }
}

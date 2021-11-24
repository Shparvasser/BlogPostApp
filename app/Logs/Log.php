<?php

namespace App\Logs;

class Log
{
    private static $rootPathDir;
    private $pathLog;
    const NEW_LOG_MESSAGE = '---NEW LOG---';

    public function __construct()
    {
        $config = CONFIGS;
        $this->pathLog = $config['logs']['path'];
    }
    public static function setPathByClass(string $path_class): Log
    {
        return new Log($path_class . '.log');
    }
    public static function setPathByMethod(string $path_method): Log
    {
        $path_method = str_replace('::', '/', $path_method);
        return new Log($path_method . '.log');
    }
    public function log(string $text)
    {
        $file = fopen($this->pathLog, mode: 'a+');
        $message = PHP_EOL . PHP_EOL . self::NEW_LOG_MESSAGE . PHP_EOL . date('Y.m.d h:i:s') . PHP_EOL . $text;
        fwrite($file, $message);
        fclose($file);
    }
    public static function setRootLogDir(string $root_path)
    {
        self::$rootPathDir = $root_path;
    }
    public function getValidPath(string $path_value)
    {
        $path = trim(str_replace('\\', '/', $path_value));
        return $path;
    }
}

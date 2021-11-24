<?php

namespace App\Model;

use App\Logs\Log;
use PDO;
use PDOException;
use Exception;
use App\Core\Registry;

class DbConnect
{
    private static $instance = null;
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * getInstance
     *
     * @return new self
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $config = CONFIGS;
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['db_name'];

        try {
            $this->pdo = new PDO("$dsn", $config['db']['username'], $config['db']['password']);
        } catch (PDOException $e) {
            $log = new Log();
            $log->log("Connection failed:, {$e->getMessage()}");
        }
    }

    private function __clone()
    {
    }

    /**
     * getExecute
     *
     * @param mixed $sql
     * @return mixed
     */
    public function getExecute(mixed $sql, array $array): mixed
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($array);
        return $sth;
    }

    /**
     * getQuery
     *
     * @param mixed $sql
     * @return mixed
     */
    public function getQuery(mixed $sql, array $array): mixed
    {
        return $this->getExecute($sql, $array);
    }
    /**
     * lastInsertId
     *
     * @return int
     */
    public function lastInsertId()
    {
        try {
            $lastId = $this->pdo->lastInsertId();
            return (int)$lastId;
        } catch (Exception $e) {
            $log = new Log();
            $log->log("Log exception, $e");
        }
    }
}

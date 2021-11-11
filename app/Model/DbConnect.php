<?php

namespace App\Model;

use PDO;
use PDOException;
use Exception;

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
        $config = require_once __DIR__ . "/../../configs/config_local.php";
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'];

        try {
            $this->pdo = new PDO("$dsn", $config['username'], $config['password']);
            echo "Database connection established";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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
    public function setQuery(mixed $sql, array $array): mixed
    {
        return $this->getExecute($sql, $array);
    }

    // public function findOne(string $sql, array $array)
    // {
    //     $exe = $this->getQuery($sql, $array);

    //     $result = $exe->fetch(PDO::FETCH_ASSOC);

    //     return $result;
    // }

    // public function findAll(string $sql, array $array)
    // {
    //     $exe = $this->getQuery($sql, $array);

    //     $result = $exe->fetchAll(PDO::FETCH_ASSOC);


    //     return $result ? $result : [];
    // }
    /**
     * insert
     *
     * @param  mixed $title
     * @param  mixed $date
     * @param  mixed $content
     * @param  mixed $author
     * @return bool
     */
    // public function insert($title, $date, $content, $author): mixed
    // {
    //     $result = $this->getQuery("INSERT INTO `posts` (`title`,`date`,`content`,`author_id`) VALUES ('$title','$date','$content','$author')", []);
    //     return $result;
    // }
    /**
     * lastInsertId
     *
     * @return int
     */
    public function lastInsertId()
    {
        try {
            $lastId = $this->pdo->lastInsertId();
            return $lastId;
        } catch (Exception $e) {
            echo $e;
        }
    }
}

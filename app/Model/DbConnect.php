<?php

namespace App\Model;

use PDO;
use PDOException;

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
		if (self::$instance == null) self::$instance = new self;
		return self::$instance;
	}

	private function __construct()
	{
		$config = require_once __DIR__ . "/../../configs/config.local.php";
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
	public function getExecute(mixed $sql): mixed
	{
		$sth = $this->pdo->prepare($sql);
		$sth->execute();
		return $sth;
	}

	/**
	 * getQuery
	 *
	 * @param mixed $sql
	 * @return mixed
	 */
	public function getQuery(mixed $sql): mixed
	{
		$exe = $this->getExecute($sql);
		$result = $exe->fetchAll(PDO::FETCH_ASSOC);
		if ($result === false) {
			return [];
		}
		return $result;
	}
	/**
	 * lastInsertId
	 *
	 * @return int
	 */
	public function lastInsertId()
	{
		return $this->lastInsertId();
	}
}

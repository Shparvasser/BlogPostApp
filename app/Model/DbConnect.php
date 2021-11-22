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
		// $sth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
			echo $e;
		}
	}
}

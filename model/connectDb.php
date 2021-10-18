<?php
class DbConnect
{

	private static $instance = null;
	private $mysqli;

	public static function getInstance()
	{
		if (self::$instance == null) self::$instance = new self;
		return self::$instance;
	}
	private function __construct()
	{
		$this->mysqli = new mysqli("localhost", "shparvasser", "250699ILB1", "stage2");
		if ($this->mysqli->connect_errno) {
			echo "<p>class = 'error'Ошибка подключения к БД" . $this->mysqli->connect_error . "</p>";
		}
	}
	private function __clone()
	{
	}
	public function getQuery($guery)
	{
		return $this->mysqli->query($guery);
	}
}

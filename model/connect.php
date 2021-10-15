<?php
class Connect
{
	private $servername, $username, $pass, $dbname;
	protected function dbConnect()
	{
		$this->servername = "localhost";
		$this->username = "root";
		$this->pass = "";
		$this->dbname = "stage2";

		$conn = new mysqli($this->servername, $this->username, $this->pass, $this->dbname);
		return $conn;
	}
}

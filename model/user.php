<?php
class User extends Connect
{

	protected function getAllUsers()
	{
		$sql = "SELECT * FROM users";
		$result = $this->dbConnect()->query($sql);
		$numRows = $result->num_rows;
		if ($numRows > 0) {

			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
}

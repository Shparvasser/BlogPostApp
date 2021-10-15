<?php
class ViewUser extends User
{

	protected function showAllUsers()
	{
		$datas = $this->getAllUsers();
		foreach ($datas as $data) {
			echo $data['name'] . "<br>";
			echo $data['surname'] . "<br>";
			echo $data['email'] . "<br>";
			echo $data['phone'] . "<br>";
			echo $data['password'] . "<br>";
		}
	}
}

<?php

namespace App\Model;

class User extends ActiveRecordEntity
{
	protected	$name, $surname, $email, $phone, $password;

	public function __construct($name, $surname, $email, $phone, $password)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->phone = $phone;
		$this->password = $password;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getSurname()
	{
		return $this->surname;
	}
	public function getEmail()
	{
		return $this->email;
	}
	public function getPhone()
	{
		return $this->phone;
	}
	public function getPassword()
	{
		return $this->password;
	}
	protected static function getTableName(): string
	{
		return 'users';
	}
}

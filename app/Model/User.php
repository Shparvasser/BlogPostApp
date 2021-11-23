<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;
use App\Model\DbConnect;
use PDO;

class User extends ActiveRecordEntity
{
    protected $name, $surname, $email, $phone, $password;

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
    public function getUser($email, $password): mixed
    {
        $exe = $this->dbc->getQuery(
            'SELECT * FROM `' . static::getTableName() . '` WHERE email= :email AND password= :password;',
            ['email' => $email, 'password' => $password]
        );
        $result = $exe->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert($name, $surname, $email, $phone, $password)
    {
        $result = $this->dbc->getQuery(
            "INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) 
                VALUES (:name,:surname,:email,:phone,:password)",
            ['name' => $name, 'surname' => $surname, 'email' => $email, 'phone' => $phone, 'password' => $password]
        );
        return $result;
    }
}

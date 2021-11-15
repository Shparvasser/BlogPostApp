<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;
use App\Model\DbConnect;
use PDO;

class User extends ActiveRecordEntity
{
    protected    $name, $surname, $email, $phone, $password;

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
    public static function getUser($email, $password): mixed
    {
        $dbc = DbConnect::getInstance();

        $exe = $dbc->getQuery(
            'SELECT * FROM `' . static::getTableName() . '` WHERE email= :email AND password= :password;',
            ['email' => $email, 'password' => $password]
        );
        $result = $exe->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function insert($name, $surname, $email, $phone, $password)
    {
        $dbc = DbConnect::getInstance();
        // $result = $dbc->getQuery("INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) VALUES ('$name','$surname','$email','$phone','$password')", []);
        $result = $dbc->getQuery("INSERT INTO `users` (`name`,`surname`,`email`,`phone`,`password`) VALUES (':name',':surname',':email',':phone',':password')", ['name' => $name, 'surname' => $surname, 'email' => $email, 'phone' => $phone, 'password' => $password]);
        return $result;
    }
}

<?php

namespace App\Model;

use App\Model\DbConnect;
use PDO;

abstract class ActiveRecordEntity
{
    /** @var int */
    public $id;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return static[]
     */
    public static function findAll(): mixed
    {
        $dbc = DbConnect::getInstance();
        return $dbc->getQuery('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }

    public static function findOne($value): mixed
    {
        $dbc = DbConnect::getInstance();

        $find = $dbc->getQuery(
            'SELECT `' . $value . '` FROM `' . static::getTableName() . '`;',
            []
        );
        $result = $find->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    abstract protected static function getTableName(): string;

    /**
     * @param int $id
     * @return mixed
     */
    public static function getById(int $id, string $value): mixed
    {
        $dbc = DbConnect::getInstance();

        $find = $dbc->getQuery(
            'SELECT * FROM `' . static::getTableName() . '` WHERE ' . $value . '= :id;',
            ['id' => $id],
            static::class
        );
        return $find;
    }
}

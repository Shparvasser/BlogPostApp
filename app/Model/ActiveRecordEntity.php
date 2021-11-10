<?php

namespace App\Model;

use App\Model\DbConnect;

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

    abstract protected static function getTableName(): string;

    /**
     * @param int $id
     * @return mixed
     */
    public static function getById(int $id): mixed
    {
        $dbc = DbConnect::getInstance();

        $entities = $dbc->getQuery(
            'SELECT * FROM `' . static::getTableName() . '` WHERE users_id= :id;',
            ['id' => $id],
            static::class
        );
        return $entities;
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

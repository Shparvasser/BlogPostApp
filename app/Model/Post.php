<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;
use Exception;

class Post extends ActiveRecordEntity
{
    protected $title, $date, $content, $author;
    public function __construct($title, $date, $content, $author)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author = $author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    protected static function getTableName(): string
    {
        return 'posts';
    }
    /**
     * insert
     *
     * @param  mixed $title
     * @param  mixed $date
     * @param  mixed $content
     * @param  mixed $author
     * @return bool
     */
    public static function insert($title, $date, $content, $author): mixed
    {
        $dbc = DbConnect::getInstance();
        $result = $dbc->getQuery("INSERT INTO `posts` (`title`,`date`,`content`,`author_id`) VALUES (':title',':date',':content',':author')", ['title' => $title, 'date' => $date, 'content' => $content, 'author' => $author]);
        return $result;
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
            return $lastId;
        } catch (Exception $e) {
            echo $e;
        }
    }
}

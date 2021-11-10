<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;

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
}

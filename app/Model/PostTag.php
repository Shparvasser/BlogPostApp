<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;

class PostTag extends ActiveRecordEntity
{
    protected static function getTableName(): string
    {
        return 'postsTags';
    }
    public static function findTag()
    {
        $dbc = DbConnect::getInstance();
        $search = $_POST['tag'];
        return $dbc->getQuery("SELECT * FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id WHERE tag_id = '$search'", [], static::class);
    }
    public static function countElements()
    {
        $dbc = DbConnect::getInstance();
        return $dbc->getQuery("SELECT tag, COUNT(tag) AS tag_count FROM `postsTags` JOIN tags ON tags.id = postsTags.tag_id JOIN posts ON posts.id = postsTags.posts_id GROUP BY tag HAVING tag_count >=1 ORDER BY tag_count DESC, tag", [], static::class);
    }
}

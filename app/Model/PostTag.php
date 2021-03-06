<?php

namespace App\Model;

use App\Model\ActiveRecordEntity;

class PostTag extends ActiveRecordEntity
{
    protected static function getTableName(): string
    {
        return 'postsTags';
    }
    public function findTag($search)
    {
        return $this->dbc->getQuery(
            "SELECT * 
                FROM `postsTags` 
                JOIN tags ON tags.id = postsTags.tag_id 
                JOIN posts ON posts.id = postsTags.posts_id 
                WHERE tag_id = :tag_id",
            ['tag_id' => $search]
        );
    }
    public function countElements()
    {
        return $this->dbc->getQuery(
            "SELECT tag, COUNT(tag) AS tag_count 
                FROM `postsTags` 
                JOIN tags ON tags.id = postsTags.tag_id
                GROUP BY tag 
                HAVING tag_count >=1 
                ORDER BY tag_count DESC, tag",
            []
        );
    }
    public function insert($resultLastId, $tag_id)
    {
        $resultPostsTags = $this->dbc->getQuery(
            "INSERT INTO `postsTags` (`posts_id`,`tag_id`) 
                VALUES (
                    (SELECT id FROM `posts` 
                    WHERE id = :id), :tag_id)",
            ['id' => $resultLastId, 'tag_id' => $tag_id]
        );
        return $resultPostsTags;
    }
}

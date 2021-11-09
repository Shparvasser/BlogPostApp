<?php

namespace App\Model;

class Tag extends ActiveRecordEntity
{
	protected $tag;

	public function getTags()
	{
		return $this->tag;
	}
	protected static function getTableName(): string
	{
		return 'tags';
	}
}

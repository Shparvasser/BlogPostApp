<?php
class Tag
{
	protected $tag;
	public function __construct($tag)
	{
		$tag = $this->tag;
	}
	public function getTags()
	{
		return $this->tag;
	}
}

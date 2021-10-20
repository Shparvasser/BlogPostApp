<?php
class Blog
{
	protected $title, $date, $content, $aftor, $tag;
	public function __construct($title, $date, $content, $aftor, $tag)
	{
		$this->title = $title;
		$this->date = $date;
		$this->content = $content;
		$this->aftor = $aftor;
		$this->tag = $tag;
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
	public function getAftor()
	{
		return $this->aftor;
	}
	public function getTag()
	{
		return $this->tag;
	}
}

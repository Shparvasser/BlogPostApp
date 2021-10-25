<?php
class Post
{
	protected $title, $date, $content, $autor, $tag;
	public function __construct($title, $date, $content, $autor, $tag)
	{
		$this->title = $title;
		$this->date = $date;
		$this->content = $content;
		$this->autor = $autor;
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
	public function getAutor()
	{
		return $this->autor;
	}
	public function getTag()
	{
		return $this->tag;
	}
}

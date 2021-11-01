<?php
namespace App\Model;
class Post
{
	protected $title, $date, $content, $autor;
	public function __construct($title, $date, $content, $autor)
	{
		$this->title = $title;
		$this->date = $date;
		$this->content = $content;
		$this->autor = $autor;
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
}

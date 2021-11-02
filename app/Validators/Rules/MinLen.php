<?php

namespace App\Validators;

use IRule;

class MinLen implements IRule
{
	private string $name;
	private $value;

	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}
	public function check()
	{
		return mb_strlen($this->value) < ($this->value);
	}
	public function message()
	{
		return "min length {$this->name} ";
	}
}

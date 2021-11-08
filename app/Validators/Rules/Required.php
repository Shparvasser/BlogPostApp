<?php

namespace App\Validators\Rules;

use IRule;

class Required implements IRule
{
	private string $name;
	private $value;

	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}
	public function check(): bool
	{
		return !empty($this->value);
	}
	public function message(): string
	{
		return "{$this->name} is required";
	}
}

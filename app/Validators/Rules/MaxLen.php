<?php

namespace App\Validators\Rules;

use App\Validators\Rules\IRule;

class MaxLen implements IRule
{
    private string $name;
    private $value;

    public function __construct($value, $name)
    {
        $this->value = $value;
        $this->name = $name;
    }
    public function check()
    {
        $result = mb_strlen($this->name) < ($this->value);
        return !$result;
    }
    public function message()
    {
        return "max length {$this->name}";
    }
}

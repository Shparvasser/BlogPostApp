<?php

namespace App\Validators\Rules;


use App\Validators\Rules\IRule;

class MinLen implements IRule
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
        $result = ($this->value) < mb_strlen($this->name);
        return !$result;
    }
    public function message()
    {
        return "min length {$this->name} ";
    }
}

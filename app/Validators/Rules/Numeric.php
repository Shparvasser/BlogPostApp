<?php

namespace App\Validators\Rules;

use App\Validators\Rules\IRule;

class Numeric implements IRule
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
        return preg_match("/[^0-9]/i", $this->value);
    }
    public function message()
    {
        return "{$this->name} should be numeric";
    }
}

<?php

namespace App\Validators\Rules;

use App\Validators\Rules\IRule;

class Alpha implements IRule
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
        return !preg_match("/[^a-zA-Z]/i", $this->name);
    }
    public function message()
    {
        return "{$this->name} should be alphabetic characters";
    }
}

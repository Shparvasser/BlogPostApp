<?php

namespace App\Validators\Rules;

class Email implements IRule
{
    private string $name;
    private $value;

    public function __construct($value, $name)
    {
        $this->name = $name;
        $this->value = $value;
    }
    public function check()
    {
        return !preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->name);
    }
    public function message()
    {
        return "Invalid {$this->name} length > {$this->value}";
    }
}

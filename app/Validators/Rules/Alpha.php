<?php

namespace App\Validators\Rules;

class Alpha extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'alpha';

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
    }
    public function check()
    {
        return preg_match("/[^a-zA-Z]/i", $this->value);
    }
    public function message()
    {
        return "{$this->name} should be alphabetic characters";
    }
}

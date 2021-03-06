<?php

namespace App\Validators\Rules;

class Numeric extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'numeric';

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
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

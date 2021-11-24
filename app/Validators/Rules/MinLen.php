<?php

namespace App\Validators\Rules;

class MinLen extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'minLen';

    public function __construct($name, $value, $rule_value)
    {
        $this->value = $value;
        $this->name = $name;
        $this->rule_value = $rule_value;
    }
    public function check()
    {
        $result = ($this->rule_value) < mb_strlen($this->value);
        return !$result;
    }
    public function message()
    {
        return "Invalid length need > {$this->rule_value}";
    }
}

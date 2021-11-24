<?php

namespace App\Validators\Rules;

class MaxLen extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'maxLen';

    public function __construct($name, $value, $rule_value)
    {
        $this->value = $value;
        $this->name = $name;
        $this->rule_value = $rule_value;
    }
    public function check()
    {
        $result = mb_strlen($this->value) < ($this->rule_value);
        return !$result;
    }
    public function message()
    {
        return "Invalid length need < {$this->rule_value}";
    }
}

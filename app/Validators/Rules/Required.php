<?php

namespace App\Validators\Rules;

class Required extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'required';

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
    }
    public function check(): bool
    {
        return empty($this->value);
    }
    public function message(): string
    {
        return "Enter your {$this->name}";
    }
}

<?php

namespace App\Validators\Rules;

abstract class Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = null;

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
    }

    public function getType()
    {
        return $this->type;
    }

    abstract public function check();
    abstract public function message();
}

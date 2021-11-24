<?php

namespace App\Validators\Rules;

class Email extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'email';

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
    }
    public function check()
    {
        return preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->value);
    }
    public function message()
    {
        return "Incorrectly entered e-mail";
    }
}

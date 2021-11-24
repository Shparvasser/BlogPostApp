<?php

namespace App\Validators\Rules;

class Password extends Rule
{
    private string $name;
    private $value;
    private $rule_value;
    protected $type = 'password';

    public function __construct($name, $value, $rule_value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rule_value = $rule_value;
    }
    public function check()
    {
        return preg_match("/[^a-zA-Z0-9]/i", $this->value);
    }
    public function message()
    {
        return "You have entered an invalid character! Only letters are allowed!";
    }
}

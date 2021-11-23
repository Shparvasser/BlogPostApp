<?php

namespace App\Validators\Rules;

use App\Validators\Rules\IRule;

class Password implements IRule
{
    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
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

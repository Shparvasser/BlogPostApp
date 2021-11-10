<?php

namespace App\Validators\Rules;

interface IRule
{
    public function check();
    public function message();
}

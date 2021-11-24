<?php

namespace App\Validators;

use Exception;

class ValidatorFactory
{
    public static function build($ruleType, $item, $item_value, $rule_value)
    {
        $rule = 'App\\Validators\\Rules\\' . ucfirst($ruleType);

        if (class_exists($rule)) {
            return new $rule($item, $item_value, $rule_value);
        } else {
            throw new Exception("Dont correct type rule");
        }
    }
}

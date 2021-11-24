<?php

namespace App\Validators;

class Validator implements IValidator
{

    public $errors = [];

    public function validate($src, $rules = [])
    {

        foreach ($src as $item => $item_value) {
            if (key_exists($item, $rules)) {

                foreach ($rules[$item] as $rule => $rule_value) {

                    if (is_int($rule)) {
                        $rule = $rule_value;
                    }
                    $returnRule = ValidatorFactory::build($rule, $item, $item_value, $rule_value);
                    if (($returnRule->check()) && empty($this->errors["$item"])) {
                        $this->errors["$item"] = $returnRule->message();
                    }
                }
            }
        }
    }

    public function error()
    {
        if (empty($this->errors)) return false;
        return $this->errors;
    }
}

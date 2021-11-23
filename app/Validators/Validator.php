<?php

namespace App\Validators;

use App\Validators\Rules\Required;
use App\Validators\Rules\MinLen;
use App\Validators\Rules\MaxLen;
use App\Validators\Rules\Numeric;
use App\Validators\Rules\Alpha;
use App\Validators\Rules\Email;
use App\Validators\Rules\Password;

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
                    switch ($rule) {
                        case 'required':
                            $validationRule = new Required($item, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;

                        case 'minLen':
                            $validationRule = new MinLen($rule_value, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;

                        case 'maxLen':
                            $validationRule = new MaxLen($rule_value, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;

                        case 'numeric':
                            $validationRule = new Numeric($item, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;
                        case 'alpha':
                            $validationRule = new Alpha($item, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;
                        case 'email':
                            $validationRule = new Email($item, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;
                        case 'password':
                            $validationRule = new Password($item, $item_value);
                            if ($validationRule->check()) {
                                $this->errors["$item"] = $validationRule->message();
                            }
                            break;
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

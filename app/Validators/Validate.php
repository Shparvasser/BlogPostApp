<?php

namespace App\Validators;

use App\Validators\Rules\Required;

class Validator implements IValidate
{

	protected $errors = [];

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
							// if (empty($item_value) && $rule_value) {
							// 	$this->addError($item, ucwords($item) . ' required');
							// }
							$validationRule = new Required($item, $item_value);
							if ($validationRule->check()) {
								$this->errors[] = $validationRule->message();
							}
							break;

						case 'minLen':
							// if (strlen($item_value) < $rule_value) {
							// 	$this->addError($item, ucwords($item) . ' should be minimum ' . $rule_value . ' characters');
							// }
							$validationRule = new MinLen($item, $item_value);
							if ($validationRule->check()) {
								$this->errors[] = $validationRule->message();
							}
							break;

						case 'maxLen':
							// if (strlen($item_value) > $rule_value) {
							// 	$this->addError($item, ucwords($item) . ' should be maximum ' . $rule_value . ' characters');
							// }
							$validationRule = new MaxLen($item, $item_value);
							if ($validationRule->check()) {
								$this->errors[] = $validationRule->message();
							}
							break;

						case 'numeric':
							// if (!ctype_digit($item_value) && $rule_value) {
							// 	$this->addError($item, ucwords($item) . ' should be numeric');
							// }
							$validationRule = new Numeric($item, $item_value);
							if ($validationRule->check()) {
								$this->errors[] = $validationRule->message();
							}
							break;
						case 'alpha':
							// if (!ctype_alpha($item_value) && $rule_value) {
							// 	$this->addError($item, ucwords($item) . ' should be alphabetic characters');
							// }
							$validationRule = new Alpha($item, $item_value);
							if ($validationRule->check()) {
								$this->errors[] = $validationRule->message();
							}
					}
				}
			}
		}
	}

	protected function addError($item, $error)
	{
		$this->errors[$item][] = $error;
	}


	public function error()
	{
		if (empty($this->errors)) return false;
		return $this->errors;
	}
}

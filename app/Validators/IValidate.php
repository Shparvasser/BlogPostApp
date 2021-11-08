<?php

namespace App\Validators;

interface IValidate
{
	public function validate($src, $rules = []);
}

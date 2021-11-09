<?php

namespace App\Validators;

interface IValidator
{
	public function validate($src, $rules = []);
}

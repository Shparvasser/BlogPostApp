<?php

namespace App\Core;

use Exception;

class Registry
{
	private $vars = [];

	/**
	 * set
	 *
	 * @param  mixed $key
	 * @param  mixed $var
	 * @return bool
	 */
	function set($key, $var)
	{
		if (isset($this->vars[$key]) == true) {
			throw new Exception('Unable to set var `' . $key . '`. Already set.');
		}
		$this->vars[$key] = $var;
		return true;
	}
	/**
	 * get
	 *
	 * @param  mixed $key
	 * @return mixed
	 */
	function get($key)
	{
		if (isset($this->vars[$key]) == false) {
			return null;
		}
		return $this->vars[$key];
	}
	function remove($key)
	{
		unset($this->vars[$key]);
	}
}

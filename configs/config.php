<?php
define("DS", DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS);
define("SITE_PATH", dirname($sitePath));

return [
	'host' => '',
	'db_name' => '',
	'username' => '',
	'password' => '',
];

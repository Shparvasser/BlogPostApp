<?php
define("DS", DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS);
define("SITE_PATH", dirname($sitePath));

return [
    'db' => [
        'host' => 'localhost',
        'db_name' => 'stage2',
        'username' => 'shparvasser',
        'password' => '250699ILB1',
    ],
    'logs' => [
        'path' => 'logs/exception/logs/sad.log'
    ]

];

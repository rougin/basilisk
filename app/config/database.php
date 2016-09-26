<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return [
    'mysql' => [
        'driver'   => env('mysql_driver'),
        'host'     => env('mysql_hostname'),
        'user'     => env('mysql_username'),
        'password' => env('mysql_password'),
        'dbname'   => env('mysql_database'),
        'charset'  => env('mysql_charset'),
    ]
];

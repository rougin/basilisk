<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return [
    'mysql' => [
        'driver'   => env('MYSQL_DRIVER'),
        'host'     => env('MYSQL_HOSTNAME'),
        'user'     => env('MYSQL_USERNAME'),
        'password' => env('MYSQL_PASSWORD'),
        'dbname'   => env('MYSQL_DATABASE'),
        'charset'  => env('MYSQL_CHARSET'),
    ]
];

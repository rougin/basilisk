<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return [
    'mysql' => [
        'driver'   => $_ENV['MYSQL_DRIVER'],
        'host'     => $_ENV['MYSQL_HOSTNAME'],
        'user'     => $_ENV['MYSQL_USERNAME'],
        'password' => $_ENV['MYSQL_PASSWORD'],
        'dbname'   => $_ENV['MYSQL_DATABASE'],
        'charset'  => $_ENV['MYSQL_CHARSET'],
    ]
];

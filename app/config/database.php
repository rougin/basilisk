<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return [
    'mysql' => [
        /**
         * The driver to be used.
         *
         * @var string
         */
        'driver' => env('MYSQL_DRIVER'),

        /**
         * Hostname to be used.
         *
         * @var string
         */
        'host' => env('MYSQL_HOSTNAME'),

        /**
         * Username to be used when connecting.
         *
         * @var string
         */
        'user' => env('MYSQL_USERNAME'),

        /**
         * Password to be used when connecting.
         *
         * @var string
         */
        'password' => env('MYSQL_PASSWORD'),

        /**
         * Name of the database.
         *
         * @var string
         */
        'dbname' => env('MYSQL_DATABASE'),

        /**
         * Character set to be used in the database.
         *
         * @var string
         */
        'charset' => env('MYSQL_CHARSET'),
    ]
];

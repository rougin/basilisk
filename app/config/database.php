<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return [
    /**
     * Returns the default configuration to be used.
     *
     * @var string
     */
    'default' => 'mysql',

    /**
     * Configuration for MySQL databases.
     *
     * @var array
     */
    'mysql' => [
        /**
         * The driver to be used.
         *
         * @var string
         */
        'driver' => env('MYSQL_DRIVER', 'mysql'),

        /**
         * Hostname to be used.
         *
         * @var string
         */
        'host' => env('MYSQL_HOSTNAME', 'localhost'),

        /**
         * Username to be used when connecting.
         *
         * @var string
         */
        'username' => env('MYSQL_USERNAME', 'root'),

        /**
         * Password to be used when connecting.
         *
         * @var string
         */
        'password' => env('MYSQL_PASSWORD', ''),

        /**
         * Name of the database.
         *
         * @var string
         */
        'database' => env('MYSQL_DATABASE', ''),

        /**
         * Character set to be used in the database.
         *
         * @var string
         */
        'charset' => env('MYSQL_CHARSET', 'utf8'),
    ]
];

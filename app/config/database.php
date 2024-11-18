<?php

/**
 * Returns an array of database connections.
 *
 * @var array<string, mixed>
 */
return array(

    /**
     * Defines the default connection to be used
     * if the connection is not yet specified.
     *
     * @var string
     */
    'default' => 'sqlite',

    /**
     * Configuration for a MySQL connection.
     *
     * @link https://www.mysql.com
     *
     * @var array<string, string>
     */
    'mysql' => array(

        /**
         * @var string
         */
        'driver' => 'mysql',

        /**
         * @var string
         */
        'host' => getenv('MYSQL_HOSTNAME'),

        /**
         * @var string
         */
        'username' => getenv('MYSQL_USERNAME'),

        /**
         * @var string
         */
        'password' => getenv('MYSQL_PASSWORD'),

        /**
         * @var string
         */
        'database' => getenv('MYSQL_DATABASE'),

        /**
         * @var integer
         */
        'port' => getenv('MYSQL_PORT'),

        /**
         * @var string
         */
        'charset' => getenv('MYSQL_CHARSET'),

    ),

    /**
     * Configuration for a SQLite connection.
     *
     * @link https://www.sqlite.org
     *
     * @var array<string, string>
     */
    'sqlite' => array(

        /**
         * @var string
         */
        'driver' => 'sqlite',

        /**
         * @var string
         */
        'database' => __DIR__ . '/../../' . getenv('SQLITE_DATABASE'),

    ),

);

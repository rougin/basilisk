<?php

/**
 * Configurations for the database.
 *
 * @var array<string, mixed>
 */
return array(
    /**
     * Default connection to be used.
     *
     * @var string
     */
    'default' => 'sqlite',

    /**
     * Configuration for the MySQL connection.
     *
     * @link https://www.mysql.com
     */
    'mysql' => array(
        /**
         * Name of the driver.
         *
         * @var string
         */
        'driver' => 'mysql',

        /**
         * Hostname to be used.
         *
         * @var string
         */
        'host' => getenv('MYSQL_HOSTNAME'),

        /**
         * Username to be used when connecting.
         *
         * @var string
         */
        'username' => getenv('MYSQL_USERNAME'),

        /**
         * Password to be used when connecting.
         *
         * @var string
         */
        'password' => getenv('MYSQL_PASSWORD'),

        /**
         * Name of the database.
         *
         * @var string
         */
        'database' => getenv('MYSQL_DATABASE'),

        /**
         * Port to be used when accessing the database.
         *
         * @var integer
         */
        'port' => getenv('MYSQL_PORT'),

        /**
         * Character set to be used in the database.
         *
         * @var string
         */
        'charset' => getenv('MYSQL_CHARSET'),
    ),

    /**
     * Configuration for the SQLite connection.
     *
     * @link https://www.sqlite.org
     */
    'sqlite' => array(
        /**
         * Name of the driver.
         *
         * @var string
         */
        'driver' => getenv('SQLITE_DRIVER'),

        /**
         * Path to SQLite database.
         *
         * @var string
         */
        'database' => __DIR__ . '/../../' . getenv('SQLITE_DATABASE'),
    ),
);

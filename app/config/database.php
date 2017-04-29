<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return array(
    /**
     * Default connection to be used.
     *
     * @var string
     */
    'default' => 'mysql',

    /**
     * Configuration for the SQLite connection.
     *
     * @link https://www.mysql.com
     */
    'sqlite' => array(
        /**
         * Name of the driver.
         *
         * @var string
         */
        'driver' => 'sqlite',

        /**
         * Path to SQLite database.
         *
         * @var string
         */
        'database' => 'path/to/sqlite/database',
    ),

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
        'database' => getenv('MYSQL_NAME'),

        /**
         * Character set to be used in the database.
         *
         * @var string
         */
        'charset' => getenv('MYSQL_CHARSET'),
    ),
);

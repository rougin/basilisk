<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return array(
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
    'mysql' => array(
        /**
         * The driver to be used.
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
         * Character set to be used in the database.
         *
         * @var string
         */
        'charset' => getenv('MYSQL_CHARSET'),
    )
);

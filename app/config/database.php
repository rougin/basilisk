<?php

/**
 * Configurations for your database.
 *
 * @var array
 */
return array(
    /**
     * The driver to be used.
     *
     * @var string
     */
    'driver' => getenv('DATABASE_DRIVER'),

    /**
     * Hostname to be used.
     *
     * @var string
     */
    'host' => getenv('DATABASE_HOSTNAME'),

    /**
     * Username to be used when connecting.
     *
     * @var string
     */
    'username' => getenv('DATABASE_USERNAME'),

    /**
     * Password to be used when connecting.
     *
     * @var string
     */
    'password' => getenv('DATABASE_PASSWORD'),

    /**
     * Name of the database.
     *
     * @var string
     */
    'database' => getenv('DATABASE_NAME'),

    /**
     * Character set to be used in the database.
     *
     * @var string
     */
    'charset' => getenv('DATABASE_CHARSET'),
);

<?php

// Loads the environment variables from an .env file.
$dotenv = new Dotenv\Dotenv(path());

$dotenv->load();

/**
 * Phinx configurations.
 *
 * @link https://phinx.org
 *
 * @var array
 */
return array(
    /**
     * List of paths.
     *
     * @var array
     */
    'paths' => array(
        /**
         * List of migration paths.
         *
         * @var array
         */
        'migrations' => array(path('app/database/migrations')),

        /**
         * List of seed paths.
         *
         * @var array
         */
        'seeds' => array(path('app/database/seeds')),
    ),

    /**
     * Configurations for specific environments.
     *
     * @var array
     */
    'environments' => array(
        /**
         * Name of the default migration table.
         *
         * @var string
         */
        'default_migration_table' => 'phinxlog',

        /**
         * Name of the default database.
         *
         * @var string
         */
        'default_database' => getenv('APP_ENVIRONMENT'),

        /**
         * Database connection based on specified environment.
         *
         * @var array
         */
        getenv('APP_ENVIRONMENT') => array(
            /**
             * Name of the database adapter.
             *
             * @var string
             */
            'adapter' => getenv('MYSQL_DRIVER'),

            /**
             * Name of the database hostname.
             *
             * @var string
             */
            'host' => getenv('MYSQL_HOSTNAME'),

            /**
             * Name of the database.
             *
             * @var string
             */
            'name' => getenv('MYSQL_DATABASE'),

            /**
             * Name of the database username.
             *
             * @var string
             */
            'user' => getenv('MYSQL_USERNAME'),

            /**
             * Name of the database password.
             *
             * @var string
             */
            'pass' => getenv('MYSQL_PASSWORD'),

            /**
             * Name of the database port number.
             *
             * @var integer
             */
            'port' => getenv('MYSQL_PORT'),

            /**
             * Name of the database character set.
             *
             * @var string
             */
            'charset' => getenv('MYSQL_CHARSET'),
        ),
    ),
);

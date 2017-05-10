<?php

// Loads the environment variables from an .env file.
(new Dotenv\Dotenv(base_path()))->load();

/**
 * Configurations for Phinx.
 *
 * @link https://phinx.org
 *
 * @var array
 */
return array(
    'paths' => array(
        'migrations' => array('%%PHINX_CONFIG_DIR%%/app/database/migrations'),
        'seeds' => array('%%PHINX_CONFIG_DIR%%/app/database/seeds'),
    ),
    'environments' => array(
        'default_migration_table' => 'phinxlog',
        'default_database' => getenv('APP_ENVIRONMENT'),
        getenv('APP_ENVIRONMENT') => array(
            'adapter' => getenv('MYSQL_DRIVER'),
            'host' => getenv('MYSQL_HOSTNAME'),
            'name' => getenv('MYSQL_DATABASE'),
            'user' => getenv('MYSQL_USERNAME'),
            'pass' => getenv('MYSQL_PASSWORD'),
            'port' => getenv('MYSQL_PORT'),
            'charset' => getenv('MYSQL_CHARSET'),
        ),
    ),
);

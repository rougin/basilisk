<?php

/**
 * In this file you can define your libraries that needs to be called BEFORE
 * Slytherin will get the specified integrations. You can specify your own
 * custom configurations here like setting session or environment variables
 * and defining constants. This file should also return an instance of
 * \Rougin\Slytherin\Integration\Configuration as it will be used for defining
 * the integrations provided in app/config/app.php file.
 *
 * @return array
 */

// Starts the session if it's loaded from a web server
// if (php_sapi_name() !== 'cli') session_start();

// Loads the container based on \Psr\Container\ContainerInterface
$container = new Rougin\Slytherin\Container\Container;

// Set your definitions to the container here...

// Loads the object for storing configurations
$config = new Rougin\Slytherin\Configuration;

// Loads the environment variables from an .env file.
(new Dotenv\Dotenv(base_path()))->load();

// Loads configuration values from the specified directory.
$config->load(__DIR__ . '/config');

// This must return \Rougin\Slytherin\Integration\Configuration and
// \Psr\Container\ContainerInterface in the same order.
return array($config, $container);

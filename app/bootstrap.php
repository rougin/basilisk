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

// Loads the container based on \Interop\Container\ContainerInterface
$container = new Rougin\Slytherin\Container\Container;

// Set your definitions to the container here...

// Loads the object for storing configurations
$config = new Rougin\Slytherin\Configuration;

// Loads the environment variables from an .env file.
(new Dotenv\Dotenv(base_path()))->load();

// Start the session.
session_start();

// Loads configuration values from the specified directory.
$config->load(__DIR__ . '/config');

// Set session variables.
$config->set('app.http.session', $_SESSION);

// This must return \Rougin\Slytherin\Integration\Configuration and
// \Interop\Container\ContainerInterface in the same order.
return array($config, $container);

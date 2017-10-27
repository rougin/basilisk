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

$reflection = new Rougin\Slytherin\Container\ReflectionContainer;

// Loads the container based on \Psr\Container\ContainerInterface
$container = new Rougin\Slytherin\Container\Container([], $reflection);

// Set your definitions to the container here...

// Loads the object for storing configurations
$config = new Rougin\Slytherin\Configuration;

// Loads the environment variables from an .env file.
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../', '.env');

// Loads configuration values from the specified directory.
$dotenv->load() && $config->load(__DIR__ . '/config');

// This must return \Rougin\Slytherin\Integration\Configuration and
// \Psr\Container\ContainerInterface in the same order.
return [ $config, $container ];

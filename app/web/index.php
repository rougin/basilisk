<?php

$root = str_replace(DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'web', '', __DIR__);

require $root . '/vendor/autoload.php';

// Loads the environment variables from an .env file.
$dotenv = new \Dotenv\Dotenv(base_path());

$dotenv->load();

// Loads the configuration data from a specified directory
$configuration = new Rougin\Slytherin\Configuration($root . '/app/config');
$integrations  = $configuration->get('app.integrations');

$application = new Rougin\Slytherin\Application($configuration->get('app.container'));

$application->integrate($integrations, $configuration)->run();

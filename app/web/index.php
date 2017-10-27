<?php

// Loads the Composer autoloader
require __DIR__ . '/../../vendor/autoload.php';

// Bootstraps the configuration before integrating it to Slytherin
list($config, $container) = require path('app/bootstrap.php');

$app = new Rougin\Slytherin\Application($container);

$app->integrate($config->get('app.integrations'), $config)->run();

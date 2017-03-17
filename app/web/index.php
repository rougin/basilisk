<?php

$root = str_replace(DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'web', '', __DIR__);

// Loads the Composer autoloader
require $root . '/vendor/autoload.php';

// Bootstraps the configuration before integrating it to Slytherin
$config = require $root . '/app/bootstrap.php';

$application = new Rougin\Slytherin\Application($config->get('app.container'));

$application->integrate($config->get('app.integrations'), $config)->run();

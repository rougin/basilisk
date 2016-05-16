<?php

define('APP', __DIR__ . '/../app');
define('BASE', __DIR__ . '/../');
define('SRC', __DIR__ . '/../src');

require BASE . '/vendor/autoload.php';
require SRC . '/helpers.php';

// Loads the environment variables from an .env file.
$dotenv = new Dotenv\Dotenv(BASE);
$dotenv->load();

// Sets the headers for the current request.
setHeaders($_SERVER, config('headers'));

// Loads the components
$components = require SRC . '/components.php';
$application = new Rougin\Slytherin\Application($components);

$application->run();

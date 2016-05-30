<?php

$slash = DIRECTORY_SEPARATOR;
$base = __DIR__ . $slash . '..' . $slash;

require $base . 'vendor' . $slash . 'autoload.php';
require $base . 'src' . $slash . 'helpers.php';

// Loads the environment variables from an .env file.
$dotenv = new Dotenv\Dotenv($base);
$dotenv->load();

// Sets the headers for the current request.
setHeaders($_SERVER, config('headers'));

// Loads the components
$components = require $base . 'src' . $slash . 'components.php';
$application = new Rougin\Slytherin\Application($components);

$application->run();

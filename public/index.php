<?php

define('APP', __DIR__ . '/../app');
define('BASE', __DIR__ . '/../');
define('SRC', __DIR__ . '/../src');

require BASE . 'vendor/autoload.php';
require SRC . '/helpers.php';

// Sets the headers for the current request
setHeaders($_SERVER, config('headers'));

$application = new Rougin\Slytherin\Application(
    require SRC . '/components.php'
);

$application->run();
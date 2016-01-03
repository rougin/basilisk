<?php

define('APP', __DIR__ . '/../app');
define('BASE', __DIR__ . '/../');
define('SRC', __DIR__ . '/../src');

require BASE . 'vendor/autoload.php';
require SRC . '/helpers.php';

$application = new Rougin\Slytherin\Application(
    require SRC . '/components.php'
);

$application->run();
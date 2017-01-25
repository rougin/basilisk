<?php

use Rougin\Slytherin\Component\Collector;

require __DIR__ . '/../../vendor/autoload.php';

// Loads the specified components
$components = Collector::get(config('app.container'), config('app.components'));
$container  = $components->getContainer();

// Starts the Slytherin application
(new Rougin\Slytherin\Application($components))->run();

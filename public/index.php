<?php

use Rougin\Slytherin\Component\Collector;

require __DIR__ . '/../vendor/autoload.php';

// Loads the helpers
$helpers = glob(__DIR__ . '/../src/Helpers/*.php');
foreach ($helpers as $helper): require $helper; endforeach;

// Loads the specified components
$components = Collector::get(config('app.container'), config('app.components'));
$GLOBALS['container'] = $components->getContainer();

// Starts the Slytherin application
(new Rougin\Slytherin\Application($components))->run();

<?php

use Rougin\Slytherin\Application\Application;
use Rougin\Slytherin\Component\Collector;
use Rougin\Slytherin\IoC\Vanilla\Container;

require __DIR__ . '/../vendor/autoload.php';

// Loads the helpers
$helpers = glob(__DIR__ . '/../src/Helpers/*.php');
foreach ($helpers as $helper): require $helper; endforeach;

// Loads the specified components
$components = Collector::get(new Container, config('app.components'));
$GLOBALS['container'] = $components->getContainer();

// Starts the Slytherin application
(new Rougin\Slytherin\Application($components))->run();

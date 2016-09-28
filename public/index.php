<?php

$base = str_replace('public', '', __DIR__);

require $base . 'vendor/autoload.php';

// Loads the helpers
$helpers = glob($base . 'src/Helpers/*.php');
array_map(function ($helper) {
    require $helper;
}, $helpers);

// Loads the specified components
$components = Rougin\Slytherin\Component\Collector::get(
    new Rougin\Slytherin\IoC\Vanilla\Container,
    config('app.components'),
    $GLOBALS
);

$application = new Rougin\Slytherin\Application($components);

$application->run();

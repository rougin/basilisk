<?php

use App\BasiliskBootstrap;

// Sets up the root directory to be used later
$search = 'app' . DIRECTORY_SEPARATOR . 'public';

$root = str_replace($search, '', __DIR__);

// Loads the "autoload.php" from Composer
require $root . 'vendor/autoload.php';

// Runs the BasiliskBootstrap instance.
BasiliskBootstrap::boot($root)->run();

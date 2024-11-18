<?php

use App\System;

// Define the root directory ---
$root = __DIR__ . '/../../';
// -----------------------------

// Load the Composer autoloader -------
require $root . '/vendor/autoload.php';
// ------------------------------------

// Run the application ---
$app = new System($root);

$app->make()->run();
// -----------------------

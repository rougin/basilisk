<?php

use App\System;

// Define the root directory ---
$root = __DIR__ . '/../../';
// -----------------------------

// Load the "autoload.php" from Composer ---
require $root . '/vendor/autoload.php';
// -----------------------------------------

// Run the application ---
$app = new System($root);

$app->make()->run();
// -----------------------

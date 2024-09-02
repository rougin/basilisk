<?php

use App\System;

// Defines the root directory --------
$root = realpath(__DIR__ . '/../../');
// -----------------------------------

// Loads the "autoload.php" from Composer ---
require $root . '/vendor/autoload.php';
// ------------------------------------------

// Runs the application ---
$app = new System($root);

$app->make()->run();
// ------------------------

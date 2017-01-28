<?php

/**
 * A listing of available HTTP routes.
 *
 * @var array
 */
return array(
    array('GET', '/', array('Skeleton\Http\Controllers\WelcomeController', 'index'), middleware()),
);

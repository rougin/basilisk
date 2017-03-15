<?php

/**
 * A listing of available HTTP routes.
 *
 * @var \Rougin\Slytherin\Routing\RoutingInterface
 */

$router = new Rougin\Slytherin\Routing\Vanilla\Router;

$router->get('/', array('Skeleton\Http\Controllers\WelcomeController', 'index'));

return $router;
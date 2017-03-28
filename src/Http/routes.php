<?php

/**
 * A listing of available HTTP routes.
 *
 * @return \Rougin\Slytherin\Routing\RoutingInterface
 */

$router = new Rougin\Slytherin\Routing\Router;

$router->get('/', array('Skeleton\Http\Controllers\WelcomeController', 'index'));

return $router;

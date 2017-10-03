<?php

/**
 * A listing of available HTTP routes.
 *
 * @return \Rougin\Slytherin\Routing\RoutingInterface
 */

$router = new Rougin\Slytherin\Routing\Router;

$router->prefix('', 'App\Http\Controllers');

$router->get('/', 'WelcomeController@index');

return $router;

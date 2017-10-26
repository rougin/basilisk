<?php

/**
 * A listing of available HTTP routes.
 *
 * @return \Rougin\Slytherin\Routing\RoutingInterface
 */

$router = new Rougin\Slytherin\Routing\Router;

$router->prefix('', 'App\Http\Controllers');

$router->get('/auth/login', 'AuthController@login');
$router->get('/', 'HomeController@index');

return $router;

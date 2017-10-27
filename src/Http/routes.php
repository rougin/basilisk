<?php

/**
 * A listing of available HTTP routes.
 *
 * @return \Rougin\Slytherin\Routing\RoutingInterface
 */

$router = new Rougin\Slytherin\Routing\Router;

$router->prefix('', 'App\Http\Controllers');

$router->get('/', 'HomeController@index');
$router->get('/auth/login', 'AuthController@login');
$router->get('/auth/logout', 'AuthController@logout');
$router->post('/auth/login', 'AuthController@login');

return $router;

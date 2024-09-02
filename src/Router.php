<?php

namespace App;

use Rougin\Slytherin\Routing\Router as Slytherin;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Router extends Slytherin
{
    /**
     * @var string
     */
    protected $namespace = 'App\Routes';

    /**
     * @var string
     */
    protected $prefix = '/';

    /**
     * Returns a listing of available routes.
     *
     * @return \Rougin\Slytherin\Routing\RouteInterface[]
     */
    public function routes()
    {
        $this->get('/', 'Hello@index');

        return $this->routes;
    }
}

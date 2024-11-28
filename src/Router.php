<?php

namespace App;

use Rougin\Slytherin\Routing\Router as Slytherin;

/**
 * @package [NAME]
 *
 * @author [AUTHOR] <[EMAIL]>
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

        $this->get('/users', 'Users@index');

        return $this->routes;
    }
}

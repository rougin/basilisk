<?php

namespace Skeleton\Components;

/**
 * Dispatcher Component
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DispatcherComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Type of the component:
     * dispatcher, debugger, http, middleware
     *
     * @var string
     */
    protected $type = 'dispatcher';

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        $routes = require base_path('src/Http/routes.php');
        $router = new \Rougin\Slytherin\Dispatching\Vanilla\Router($routes);

        return new \Rougin\Slytherin\Dispatching\Vanilla\Dispatcher($router);
    }
}

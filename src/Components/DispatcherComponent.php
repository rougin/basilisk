<?php

namespace App\Components;

use Rougin\Slytherin\Dispatching\Vanilla\Router;
use Rougin\Slytherin\Component\AbstractComponent;
use Rougin\Slytherin\Dispatching\Vanilla\Dispatcher;

/**
 * Dispatcher Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DispatcherComponent extends AbstractComponent
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
        $routes = require __DIR__ . '/../../src/Http/routes.php';

        return new Dispatcher(new Router($routes));
    }
}

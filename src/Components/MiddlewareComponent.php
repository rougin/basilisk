<?php

namespace Skeleton\Components;

/**
 * Middleware Component
 *
 * Loads the middleware builder for gathering defined middlewares.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class MiddlewareComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Type of the component:
     * dispatcher, debugger, http, middleware
     *
     * @var string
     */
    protected $type = 'middleware';

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        $pipe = new \Zend\Stratigility\MiddlewarePipe;

        return new \Rougin\Slytherin\Middleware\Stratigility\Middleware($pipe);
    }
}

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
        $middleware = new \Rougin\Slytherin\Middleware\VanillaMiddleware;

        if (class_exists('Zend\Stratigility\MiddlewarePipe')) {
            $middleware = new \Zend\Stratigility\MiddlewarePipe;
            $middleware = new \Rougin\Slytherin\Middleware\StratigilityMiddleware($middleware);
        }

        return $middleware;
    }
}

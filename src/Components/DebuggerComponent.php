<?php

namespace Skeleton\Components;

/**
 * Debugger Component
 *
 * Enables the use of error handler or an exception handler.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DebuggerComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Type of the component:
     * dispatcher, error handler, http, middleware
     *
     * @var string
     */
    protected $type = 'error_handler';

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        $handler = new \Rougin\Slytherin\Debug\VanillaErrorHandler;

        if (class_exists('Whoops\Run')) {
            $whoops  = new \Whoops\Run;
            $handler = new \Rougin\Slytherin\Debug\WhoopsErrorHandler($whoops);
        }

        $handler->setEnvironment(config('app.environment'));

        return $handler;
    }
}

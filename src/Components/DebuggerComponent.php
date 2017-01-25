<?php

namespace Skeleton\Components;

/**
 * Debugger Component
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DebuggerComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Type of the component:
     * dispatcher, debugger, http, middleware
     *
     * @var string
     */
    protected $type = 'debugger';

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        $debugger = new \Rougin\Slytherin\Debug\Vanilla\Debugger;

        if (class_exists('Whoops\Run')) {
            $debugger = new \Rougin\Slytherin\Debug\Whoops\Debugger(new \Whoops\Run);
        }

        $debugger->setEnvironment(config('app.environment'));

        return $debugger;
    }
}

<?php

namespace App\Components;

use Interop\Container\ContainerInterface;

/**
 * Eloquent Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class EloquentComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Sets the component and add it to the container of your choice.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        $capsule = new \Illuminate\Database\Capsule\Manager;

        $database = config('database.' . config('database.default'));

        $database['charset']   = 'utf8';
        $database['collation'] = 'utf8_unicode_ci';
        $database['prefix']    = '';

        $capsule->addConnection($database);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}

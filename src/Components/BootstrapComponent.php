<?php

namespace App\Components;

use Dotenv\Dotenv;
use Interop\Container\ContainerInterface;
use Rougin\Slytherin\Component\AbstractComponent;

/**
 * Bootstrap Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BootstrapComponent extends AbstractComponent
{
    /**
     * Sets the component.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        // Loads the environment variables from an .env file.
        (new Dotenv(base()))->load();

        // Sets the default timezone
        date_default_timezone_set(env('timezone', 'Asia/Manila'));

        // Start the session
        session_start();
    }
}

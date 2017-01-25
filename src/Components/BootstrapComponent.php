<?php

namespace Skeleton\Components;

/**
 * Bootstrap Component
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BootstrapComponent extends \Rougin\Slytherin\Component\AbstractComponent
{
    /**
     * Sets the component.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(\Interop\Container\ContainerInterface &$container)
    {
        // Loads the environment variables from an .env file.
        (new \Dotenv\Dotenv(base_path()))->load();

        // Sets the default timezone
        date_default_timezone_set(config('app.timezone'));

        // Start the session
        session_start();
    }
}

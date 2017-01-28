<?php

namespace Skeleton\Components;

/**
 * Bootstrap Component
 *
 * Loads the environment variables and enables the session.
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
        $dotenv = new \Dotenv\Dotenv(base_path());

        $dotenv->load();

        // Sets the default timezone
        date_default_timezone_set(config('app.timezone'));

        // Start the session
        session_start();
    }
}

<?php

namespace App;

use Rougin\Slytherin\Application;
use Rougin\Slytherin\Configuration;
use Rougin\Slytherin\Container\Container;
use Rougin\Slytherin\Container\ReflectionContainer;

/**
 * Basilisk Boostrap
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BasiliskBootstrap
{
    /**
     * Bootstraps the application.
     *
     * @param  string $root
     * @return \Rougin\Slytherin\Application
     */
    public static function boot($root)
    {
        $reflection = new ReflectionContainer;

        $container = new Container(array(), $reflection);

        (new \Dotenv\Dotenv($root))->load();

        $config = new Configuration;

        $config->load($root . '/app/config');

        $app = new Application($container);

        $integrations = $config->get('app.integrations');

        return $app->integrate($integrations, $config);
    }
}

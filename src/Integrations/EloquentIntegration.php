<?php

namespace Skeleton\Integrations;

use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Container\ContainerInterface;

/**
 * Eloquent Integration
 *
 * An integration for Laravel's Eloquent package.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class EloquentIntegration implements \Rougin\Slytherin\Integration\IntegrationInterface
{
    /**
     * Defines the specified integration.
     *
     * @param  \Rougin\Slytherin\Container\ContainerInterface $container
     * @param  \Rougin\Slytherin\Integration\Configuration    $config
     * @return \Rougin\Slytherin\Container\ContainerInterface
     */
    public function define(ContainerInterface $container, Configuration $config)
    {
        if (class_exists('Illuminate\Database\Capsule\Manager')) {
            $capsule = new \Illuminate\Database\Capsule\Manager;

            $database = config('database.' . config('database.default'));

            $database['charset']   = 'utf8';
            $database['collation'] = 'utf8_unicode_ci';
            $database['prefix']    = '';

            $capsule->addConnection($database);

            $capsule->setAsGlobal();
            $capsule->bootEloquent();
        }

        return $container;
    }
}

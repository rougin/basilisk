<?php

namespace App\Integrations;

use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Container\ContainerInterface;

/**
 * Authentication Integration
 *
 * Bootstraps the additional definitions and integrate it to Slytherin.
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AuthIntegration implements \Rougin\Slytherin\Integration\IntegrationInterface
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
        $interface = \Rougin\Authsum\Checker\CheckerInterface::class;

        $model = \App\Models\User::class;

        $checker = new \Rougin\Authsum\Checker\EloquentChecker($model);

        return $container->set($interface, $checker);
    }
}

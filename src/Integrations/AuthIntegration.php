<?php

namespace App\Integrations;

use Rougin\Authsum\Checker\EloquentChecker;
use Rougin\Slytherin\Container\ContainerInterface;
use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Integration\IntegrationInterface;

/**
 * Authentication Integration
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class AuthIntegration implements IntegrationInterface
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
        $checker = new EloquentChecker('App\Entities\User');

        $interface = 'Rougin\Authsum\Checker\CheckerInterface';

        return $container->set((string) $interface, $checker);
    }
}

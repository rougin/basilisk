<?php

namespace App\Integrations;

use Rougin\Slytherin\Container\ContainerInterface;
use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Integration\IntegrationInterface;

/**
 * Application Integration
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class AppIntegration implements IntegrationInterface
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
        // Sets the default timezone
        date_default_timezone_set($config->get('app.timezone'));

        return $container;
    }
}

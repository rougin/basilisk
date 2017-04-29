<?php

namespace Skeleton\Integrations;

use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Container\ContainerInterface;

/**
 * Application Integration
 *
 * Bootstraps the application and integrate it to Slytherin.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationIntegration implements \Rougin\Slytherin\Integration\IntegrationInterface
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
        date_default_timezone_set(config('app.timezone'));

        // If Twig is installed, add additional globals and functions to it.
        if (class_exists('Twig_Environment')) {
            $interface = 'Rougin\Slytherin\Template\RendererInterface';

            $renderer = app($interface);

            $renderer->addGlobal('request', request());

            $renderer->addFunction(new \Twig_SimpleFunction('config', 'config'));
            $renderer->addFunction(new \Twig_SimpleFunction('url', 'url'));

            $container->set($interface, $renderer);
        }

        return $container;
    }
}

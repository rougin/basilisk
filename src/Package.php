<?php

namespace App;

use Rougin\Slytherin\Container\ContainerInterface;
use Rougin\Slytherin\Integration\Configuration;
use Rougin\Slytherin\Integration\IntegrationInterface;
use Rougin\Slytherin\Routing\RouterInterface;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Package implements IntegrationInterface
{
    /**
     * @param \Rougin\Slytherin\Container\ContainerInterface $container
     * @param \Rougin\Slytherin\Integration\Configuration    $config
     *
     * @return \Rougin\Slytherin\Container\ContainerInterface
     */
    public function define(ContainerInterface $container, Configuration $config)
    {
        $current = new Router;

        if ($container->has(RouterInterface::class))
        {
            /** @var \Rougin\Slytherin\Routing\RouterInterface */
            $router = $container->get(RouterInterface::class);

            $current = $router->merge($current->routes());
        }

        $interface = RouterInterface::class;

        return $container->set($interface, $current);
    }
}

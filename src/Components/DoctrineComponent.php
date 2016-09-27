<?php

namespace App\Components;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

use Rougin\Slytherin\Component\AbstractComponent;

/**
 * Doctrine Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class DoctrineComponent extends AbstractComponent
{
    /**
     * Sets the component and add it to the container of your choice.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            config('doctrine.model_paths'),
            config('doctrine.developer_mode')
        );

        $config->setProxyDir(config('doctrine.proxy_path'));
        $config->setAutoGenerateProxyClasses(config('doctrine.developer_mode'));

        $entityManager = EntityManager::create(config('database.mysql'), $config);

        $container->add('Doctrine\ORM\EntityManager', $entityManager);

        return;
    }
}

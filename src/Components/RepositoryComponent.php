<?php

namespace App\Components;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

use Rougin\Slytherin\Component\AbstractComponent;

/**
 * Repository Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class RepositoryComponent extends AbstractComponent
{
    /**
     * Sets the component.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        $entityManager = $container->get(EntityManager::class);

        $path  = base('src/Repositories/');
        $files = glob($path . '*Repository.php');

        foreach ($files as $item) {
            $entity = str_replace([ $path, 'Repository.php' ], [ '', '' ], $item);
            $model  = 'App\\Models\\' . $entity;
            $name   = 'App\\Repositories\\' . $entity . 'Repository';

            $metadata = $entityManager->getClassMetadata($model);

            $container->add($name, new $name($entityManager, $metadata));
        }

        return;
    }
}
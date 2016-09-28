<?php

namespace App\Components;

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
        $entityManager = $container->get('Doctrine\ORM\EntityManager');

        $path  = base('src/Repositories/');
        $files = glob($path . '*Repository.php');

        foreach ($files as $item) {
            $entity = str_replace([ $path, 'Repository.php' ], [ '', '' ], $item);
            $model  = 'App\\Models\\' . $entity;
            $name   = 'App\\Repositories\\' . $entity . 'Repository';

            $metadata = $entityManager->getClassMetadata($model);

            $container[$name] = new $name($entityManager, $metadata);
        }

        return;
    }
}

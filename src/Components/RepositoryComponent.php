<?php

namespace App\Components;

use Doctrine\ORM\EntityManager;

use Rougin\Slytherin\IoC\ContainerInterface;
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
     * Checks if the said component needs a container.
     * 
     * @var boolean
     */
    protected $container = true;

    /**
     * Returns an instance from the named class.
     *
     * @param \Rougin\Slytherin\IoC\ContainerInterface|null $container
     * @return mixed
     */
    public function get(ContainerInterface $container = null)
    {
        $entityManager = $container->get(EntityManager::class);

        $basePath = __DIR__ . DIRECTORY_SEPARATOR;
        $directory = str_replace('Components', 'Repositories', $basePath);

        $files = glob($directory . '*Repository.php');
        $search = [ $directory, 'Repository.php' ];
        $replace = [ '', '' ];
        $repositories = [];

        foreach ($files as $item) {
            $entity = str_replace($search, $replace, $item);
            $repositoryName = $entity . 'Repository';

            $model = 'App\Models\\' . $entity;
            $repository = 'App\Repositories\\' . $repositoryName;

            $metadata = $entityManager->getClassMetadata($model);

            $repositories[$repository] = new $repository($entityManager, $metadata);
        }

        return $repositories;
    }
}

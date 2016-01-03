<?php

namespace App\Facades;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Entity Manager Facade
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class EntityManager
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private static $entityManager;

    /**
     * Flushes all changes to objects that have been queued up to now to the
     * database. This effectively synchronizes the in-memory state of managed
     * objects with the database.
     * 
     * @param  null|object|array $entity
     * @return void
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public static function flush($entity = null)
    {
        return self::$entityManager->flush($entity);
    }

    /**
     * Gets the repository for an entity class.
     *
     * @param  string $entityName
     * @return \Doctrine\ORM\EntityRepository
     */
    public static function getRepository($entityName)
    {
        return self::$entityManager->getRepository($entityName);
    }

    /**
     * Tells the EntityManager to make an instance managed and persistent.
     * 
     * @param  object $entity
     * @return void
     *
     * @throws ORMInvalidArgumentException
     */
    public static function persist($entity)
    {
        return self::$entityManager->persist($entity);
    }

    /**
     * Sets the entity manager.
     * 
     * @param  \Doctrine\ORM\EntityManagerInterface $entityManager
     * @return void
     */
    public static function set(EntityManagerInterface $entityManager)
    {
        self::$entityManager = $entityManager;
    }
}

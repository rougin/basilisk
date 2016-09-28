<?php

use Doctrine\Common\Persistence\ObjectRepository;

if (! function_exists('repository')) {
    /**
     * Returns an instance of an EntityRepository.
     *
     * @param  \Doctrine\ORM\EntityRepository $entityRepository
     * @return \Doctrine\ORM\EntityRepository
     */
    function repository(ObjectRepository $entityRepository)
    {
        return container()->get($entityRepository);
    }
}

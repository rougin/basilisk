<?php

use Doctrine\ORM\EntityRepository;

if (! function_exists('repository')) {
    /**
     * Returns an instance of an EntityRepository.
     *
     * @param  \Doctrine\ORM\EntityRepository $entityRepository
     * @return \Doctrine\ORM\EntityRepository
     */
    function repository(EntityRepository $entityRepository)
    {
        return container()->get($entityRepository);
    }
}

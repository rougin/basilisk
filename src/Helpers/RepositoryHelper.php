<?php

if (! function_exists('repository')) {
    /**
     * Returns an instance of an EntityRepository.
     *
     * @param  string $entityRepository
     * @return \Doctrine\ORM\EntityRepository
     */
    function repository($entityRepository)
    {
        return container()->get($entityRepository);
    }
}

<?php

if (! function_exists('container')) {
    /**
     * Returns an instance of the used Container.
     *
     * @return \Interop\Container\ContainerInterface
     */
    function container()
    {
        return $GLOBALS['container'];
    }
}

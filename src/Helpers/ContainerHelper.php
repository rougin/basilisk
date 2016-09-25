<?php

if ( ! function_exists('container')) {
    /**
     * Returns an instance of the used Container.
     * 
     * @return Rougin\Slytherin\IoC\ContainerInterface;
     */
    function container()
    {
        return $GLOBALS['container'];
    }
}

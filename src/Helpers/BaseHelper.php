<?php

if ( ! function_exists('base')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function base($item = null)
    {
        $separator = DIRECTORY_SEPARATOR;
        $basePath  = str_replace('src' . $separator . 'Helpers', '', __DIR__);

        return $basePath . $item;
    }
}

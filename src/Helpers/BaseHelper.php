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
        $slash = DIRECTORY_SEPARATOR;
        $base  = str_replace('src' . $slash . 'Helpers', '', __DIR__);

        return $base . str_replace([ '\\', '/' ], $slash, $item);
    }
}

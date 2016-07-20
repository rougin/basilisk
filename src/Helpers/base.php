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
        $base = str_replace('src' . DIRECTORY_SEPARATOR . 'Helpers', '', __DIR__);

        return $base . $item;
    }
}

<?php

if (! function_exists('path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function path($item = null)
    {
        $item = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $item);

        return str_replace('src', '', __DIR__) . $item;
    }
}

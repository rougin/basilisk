<?php

if (! function_exists('base_path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function base_path($item = null)
    {
        $slash = DIRECTORY_SEPARATOR;

        $path = str_replace('src' . $slash . 'Helpers', '', __DIR__);

        return $path . str_replace([ '\\', '/' ], $slash, $item);
    }
}

<?php

if (! function_exists('middleware')) {
    /**
     * Returns a listing of middleware/s.
     *
     * @param  string|null $item
     * @return array
     */
    function middleware($item = null)
    {
        $items = require base('/src/Http/middlewares.php');

        return file_contents(base('/src/Http/middlewares.php'), $item, $items);
    }
}

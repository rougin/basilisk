<?php

if (! function_exists('middleware')) {
    /**
     * Returns a listing of middleware/s.
     *
     * @param  string|null $item
     * @return mixed
     */
    function middleware($item = null)
    {
        return file_contents(base_path('src/Http/middlewares.php'), $item);
    }
}

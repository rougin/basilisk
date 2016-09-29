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
        $item = ($item !== null) ? '.' . $item : '';

        return config('middlewares' . $item);
    }
}

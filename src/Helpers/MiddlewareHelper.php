<?php

if (! function_exists('middleware')) {
    /**
     * Returns a listing of middleware/s.
     *
     * @param  string|null $location
     * @return array
     */
    function middleware($item = null)
    {
        if ($item == null) {
            return config('middlewares');
        }

        return config('middlewares.' . $item);
    }
}

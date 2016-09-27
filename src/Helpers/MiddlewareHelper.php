<?php

if ( ! function_exists('middleware')) {
    /**
     * Returns a listing of middleware/s.
     * 
     * @param  string $location
     * @return array
     */
    function middleware($location)
    {
        return config('middlewares.' . $location);
    }
}

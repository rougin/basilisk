<?php

if (! function_exists('env')) {
    /**
     * Returns a value from $_ENV array.
     *
     * @param  string $key
     * @param  string $default
     * @return string|null
     */
    function env($key, $default = null)
    {
        $value = getenv(strtoupper($key));

        return ($value !== false) ? $value : $default;
    }
}

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
        if (! isset($_ENV[strtoupper($key)])) {
            return $default;
        }

        return $_ENV[strtoupper($key)];
    }
}

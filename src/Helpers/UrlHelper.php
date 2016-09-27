<?php

if (! function_exists('url')) {
    /**
     * Is HTTPS?
     *
     * Determines if the application is accessed via an encrypted
     * (HTTPS) connection.
     *
     * @return boolean
     */
    function is_https()
    {
        $server = request()->getServerParams();

        if (! empty($server['HTTPS']) && strtolower($server['HTTPS']) !== 'off') {
            return true;
        } elseif (isset($server['HTTP_X_FORWARDED_PROTO']) && strtolower($server['HTTP_X_FORWARDED_PROTO']) === 'https') {
            return true;
        } elseif (! empty($server['HTTP_FRONT_END_HTTPS']) && strtolower($server['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return true;
        }

        return false;
    }

    /**
     * Returns the base URL of the application.
     *
     * @param  string $link
     * @return string
     */
    function url($link = null)
    {
        if ($url = config('app.base_url')) {
            return $url . $link;
        }

        $server = request()->getServerParams();
        $url    = 'http://localhost/';

        // Guess the location of the application
        if (isset($server['SERVER_ADDR'])) {
            $address = $server['SERVER_ADDR'];

            if (strpos($server['SERVER_ADDR'], ':') !== false) {
                $address = '[' . $server['SERVER_ADDR'] . ']';
            }

            $address  = str_replace([ '127.0.0.1', '[::1]' ], 'localhost', $address);
            $basename = basename($server['SCRIPT_FILENAME']);
            $position = strpos($server['SCRIPT_NAME'], $basename) - 1;

            $http = (is_https()) ? 'https' : 'http';
            $url  = $http . '://' . $address . substr($server['SCRIPT_NAME'], 0, $position);
        }

        return $url . $link;
    }
}

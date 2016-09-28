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
    function isHttps()
    {
        $server = request()->getServerParams();

        $forwardedPhoto = $server['HTTP_X_FORWARDED_PROTO'];
        $frontEndHttps  = $server['HTTP_FRONT_END_HTTPS'];

        if (! empty($server['HTTPS']) && strtolower($server['HTTPS']) !== 'off') {
            return true;
        } elseif (isset($forwardedPhoto) && strtolower($forwardedPhoto) === 'https') {
            return true;
        } elseif (! empty($frontEndHttps) && strtolower($frontEndHttps) !== 'off') {
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

            $http = (isHttps()) ? 'https' : 'http';
            $url  = $http . '://' . $address . substr($server['SCRIPT_NAME'], 0, $position);
        }

        return $url . $link;
    }
}

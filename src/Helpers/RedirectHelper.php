<?php

if (! function_exists('redirect')) {
    /**
     * Returns a redirect response.
     *
     * @param  string $url
     * @param  array  $data
     * @return void
     */
    function redirect($url, $data = [], $exit = true)
    {
        $url = ($url == '/') ? null : $url;

        session($data);

        $url = (strpos($url, 'http') === false) ? url('/' . $url) : $url;

        header('Location: ' . $url);

        return ($exit) ? exit : null;
    }
}

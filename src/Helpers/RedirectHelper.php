<?php

if (! function_exists('redirect')) {
    /**
     * Returns a redirect response.
     *
     * @param  string $url
     * @param  array  $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    function redirect($url, $data = [])
    {
        $url = ($url == '/') ? null : $url;

        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        if (strpos($url, 'http') === false) {
            $url = url('/' . $url);
        }

        exit(header('Location: ' . $url));
    }
}

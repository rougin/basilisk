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

        session($data);

        if (strpos($url, 'http') === false) {
            $url = url('/' . $url);
        }

        exit(header('Location: ' . $url));
    }
}

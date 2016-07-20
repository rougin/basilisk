<?php

if ( ! function_exists('redirect')) {
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

        if (strpos($url, 'http://') === false && strpos($url, 'https://') === false) {
            $url = config('app.base_url') . '/' . $url;
        }

        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }

        header('Location: ' . $url); exit;
    }
}

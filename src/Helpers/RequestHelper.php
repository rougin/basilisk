<?php

if (! function_exists('request')) {
    /**
     * Returns an instance of a ServerRequest.
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    function request()
    {
        global $container;

        return $container->get('Psr\Http\Message\ServerRequestInterface');
    }
}

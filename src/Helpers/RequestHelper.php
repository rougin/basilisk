<?php

use Psr\Http\Message\ServerRequestInterface;

if (! function_exists('request')) {
    /**
     * Returns an instance of a ServerRequest.
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    function request()
    {
        return container()->get(ServerRequestInterface::class);
    }
}
